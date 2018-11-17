<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Auth\Http\Controllers\Admin',
    'middleware' => ['web'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (Router $router) {

    $router->get('login', [
        'uses' => 'SessionController@showLogin',
        'as' => 'login.show'
    ]);

    $router->post('login', [
        'uses' => 'SessionController@handleLogin',
        'as' => 'login.handle'
    ]);

    $router->get('logout', [
        'uses' => 'SessionController@handleLogout',
        'as' => 'logout.handle'
    ]);

});

$router->group([
    'namespace' => 'Modules\Auth\Http\Controllers\Admin',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (Router $router) {

    $router->resource('users', 'UserController');

    $router->put('users/{user}/password', [
        'uses' => 'UserController@updatePassword',
        'as' => 'users.update.password'
    ]);

    $router->resource('roles', 'RoleController');

    $router->get('profile', [
        'uses' => 'ProfileController@edit',
        'as' => 'profile.edit'
    ]);

    $router->put('profile', [
        'uses' => 'ProfileController@update',
        'as' => 'profile.update'
    ]);

    $router->put('profile/password', [
        'uses' => 'ProfileController@updatePassword',
        'as' => 'profile.password.update'
    ]);

    $router->get('profile/settings', [
        'uses' => 'ProfileController@editSettings',
        'as' => 'profile.settings.edit'
    ]);

    $router->put('profile/settings', [
        'uses' => 'ProfileController@updateSettings',
        'as' => 'profile.settings.update'
    ]);

    $router->post('session/{user}/impersonate', [
        'uses' => 'ImpersonationController@impersonate',
        'as' => 'session.impersonate'
    ]);

    $router->post('session/restore', [
        'uses' => 'ImpersonationController@restore',
        'as' => 'session.restore'
    ]);

});
