<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Content\Http\Controllers\Admin',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (Router $router) {

    $router->resource('pages', 'PageController');

});

$router->group([
    'namespace' => 'Modules\Content\Http\Controllers\Admin\Page',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin/pages/{page}',
    'as' => 'admin.pages.'
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
