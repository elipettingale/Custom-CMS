<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\News\Http\Controllers\Admin',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (Router $router) {

    $router->resource('posts', 'PostController');
    $router->resource('post-categories', 'PostCategoryController');

});

$router->group([
    'namespace' => 'Modules\News\Http\Controllers\Admin\Post',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin/posts/{post}',
    'as' => 'admin.posts.'
], function (Router $router) {

    $router->put('mark-as-live', [
        'uses' => 'StatusController@markAsLive',
        'as' => 'mark-as-live'
    ]);

    $router->put('mark-as-draft', [
        'uses' => 'StatusController@markAsDraft',
        'as' => 'mark-as-draft'
    ]);

});
