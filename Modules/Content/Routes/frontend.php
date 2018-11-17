<?php

use Illuminate\Routing\Router;
use Modules\Content\Http\Controllers\Frontend\PageController;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Content\Http\Controllers\Frontend',
    'middleware' => ['web', 'frontend'],
    'prefix' => '',
    'as' => 'frontend.'
], function (Router $router) {

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

});
