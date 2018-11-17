<?php

use Illuminate\Routing\Router;

if (!app()->routesAreCached()) {

    $router = app('router');
    $namespace = 'Modules\Core\Http\Controllers';

    $router->group([
        'namespace' => $namespace,
        'middleware' => ['web']
    ], function (Router $router) {
        require __DIR__ . '/Routes/web.php';
    });

}
