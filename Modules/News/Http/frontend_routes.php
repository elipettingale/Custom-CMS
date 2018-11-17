<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\News\Http\Controllers\Frontend',
    'middleware' => ['web', 'frontend'],
    'prefix' => '',
    'as' => 'frontend.'
], function (Router $router) {

    $router->get('news', [
        'uses' => 'PostController@index',
        'as' => 'posts.index'
    ]);

    $router->get('news/{slug}', [
        'uses' => 'PostController@show',
        'as' => 'posts.show'
    ]);

});
