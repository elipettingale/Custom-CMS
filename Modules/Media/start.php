<?php

use Illuminate\Routing\Router;

if (!app()->routesAreCached()) {

    $router = app('router');
    $namespace = 'Modules\Media\Http\Controllers';

    $router->group([
        'namespace' => $namespace . '\Admin',
        'middleware' => ['web', 'auth'],
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function (Router $router) {
        require __DIR__ . '/Routes/admin.php';
    });

    $router->group([
        'namespace' => $namespace . '\Api',
        'middleware' => ['web', 'auth'],
        'prefix' => 'api',
        'as' => 'api.'
    ], function (Router $router) {
        require __DIR__ . '/Routes/api.php';
    });

}
