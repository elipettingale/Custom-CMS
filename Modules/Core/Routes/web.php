<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Core\Http\Controllers',
    'middleware' => ['web', 'auth'],
    'prefix' => 'static'
], function(Router $router) {

    $router->get('{template}', [
        'uses' => 'StaticTemplateController@show'
    ]);

    $router->get('markdown/{template}', [
        'uses' => 'StaticTemplateController@markdown'
    ]);

    $router->get('pdf/{template}', [
        'uses' => 'StaticTemplateController@pdf'
    ]);

});
