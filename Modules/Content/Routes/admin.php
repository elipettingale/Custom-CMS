<?php

use Illuminate\Routing\Router;

$router->resource('pages', 'PageController');

$router->group([
    'namespace' => 'Page',
    'prefix' => 'pages/{page}',
    'as' => 'pages.'
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
