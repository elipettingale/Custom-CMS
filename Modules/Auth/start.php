<?php

use Illuminate\Routing\Router;

if (!app()->routesAreCached()) {

    $router = app('router');
    $namespace = 'Modules\Auth\Http\Controllers';

    $router->group([
        'namespace' => $namespace . '\Admin',
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function (Router $router) {
        require __DIR__ . '/Routes/admin.php';
    });

    $router->group([
        'namespace' => $namespace,
        'middleware' => ['web']
    ], function (Router $router) {
        require __DIR__ . '/Routes/web.php';
    });

}
