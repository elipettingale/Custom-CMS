<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Settings\Http\Controllers\Admin',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (Router $router) {

    $router->get('settings', [
        'uses' => 'SettingsController@edit',
        'as' => 'settings.edit'
    ]);

    $router->put('settings', [
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);

});
