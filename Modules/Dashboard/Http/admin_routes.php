<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Dashboard\Http\Controllers\Admin',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (Router $router) {

   $router->get('/', [
       'uses' => 'DashboardController@show',
       'as' => 'dashboard.show'
   ]);

});
