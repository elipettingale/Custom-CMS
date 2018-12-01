<?php

use Illuminate\Routing\Router;

if (!app()->routesAreCached()) {

    $router = app('router');
    $namespace = 'Modules\News\Http\Controllers';

    $router->group([
        'namespace' => $namespace . '\Admin',
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function (Router $router) {
        require __DIR__ . '/Routes/admin.php';
    });

    $router->group([
        'namespace' => $namespace . '\Frontend',
        'middleware' => ['web'],
        'prefix' => '',
        'as' => 'frontend.'
    ], function (Router $router) {
        require __DIR__ . '/Routes/frontend.php';
    });

}
