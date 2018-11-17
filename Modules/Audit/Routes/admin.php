<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Audit\Http\Controllers\Admin',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (Router $router) {

    $router->resource('audit-logs', 'AuditLogController');

});
