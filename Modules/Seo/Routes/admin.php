<?php

use Modules\Seo\Http\Controllers\Admin\SeoController;
use Modules\News\Entities\Post;
use Modules\Content\Entities\Page;

/**
 * Modules\News\Entities\Post
 */
$router->get('posts/{post}/seo/edit', function(Post $post) {
    return app(SeoController::class)->edit($post);
})->name('posts.seo.edit');

$router->put('posts/{post}/seo', function(Post $post) {
    return app(SeoController::class)->update($post, request());
})->name('posts.seo.update');

/**
 * Modules\Content\Entities\Page
 */
$router->get('pages/{page}/seo/edit', function(Page $page) {
    return app(SeoController::class)->edit($page);
})->name('pages.seo.edit');

$router->put('pages/{page}/seo', function(Page $page) {
    return app(SeoController::class)->update($page, request());
})->name('pages.seo.update');
