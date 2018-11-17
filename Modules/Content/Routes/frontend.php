<?php

use Modules\Content\Http\Controllers\Frontend\PageController;

$router->get('/', function() {
    $controller = app(PageController::class);
    return $controller->show(request(), config('content.homepage-slug'));
})->name('pages.home');

$router->get('{slug}', function($slug) {
   $controller = app(PageController::class);

   if ($slug === config('content.homepage-slug')) {
       return redirect()->to('/');
   }

   return $controller->show(request(), $slug);
})->name('pages.show');
