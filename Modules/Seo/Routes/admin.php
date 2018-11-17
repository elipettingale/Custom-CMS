<?php

use Modules\Seo\Http\Controllers\Admin\SeoController;
use Modules\News\Entities\Post;
use Modules\Content\Entities\Page;

$map = [
    'posts' => Post::class,
    'pages' => Page::class
];

$router->get('{entity}/{id}/seo/edit', function($entity, $id) use ($map) {
    return app(SeoController::class)->edit(
        $map[$entity]::findOrFail($id)
    );
})->name('seo.edit');

$router->put('{entity}/{id}/seo', function($entity, $id) use ($map) {
    return app(SeoController::class)->update(
        $map[$entity]::findOrFail($id), request()
    );
})->name('seo.update');
