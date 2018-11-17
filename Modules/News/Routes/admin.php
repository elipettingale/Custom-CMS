<?php

use Illuminate\Routing\Router;

$router->resource('posts', 'PostController');
$router->resource('post-categories', 'PostCategoryController');

$router->group([
    'namespace' => 'Post',
    'prefix' => 'posts/{post}',
    'as' => 'posts.'
], function(Router $router) {

    $router->put('mark-as-live', [
        'uses' => 'StatusController@markAsLive',
        'as' => 'mark-as-live'
    ]);

    $router->put('mark-as-draft', [
        'uses' => 'StatusController@markAsDraft',
        'as' => 'mark-as-draft'
    ]);

});
