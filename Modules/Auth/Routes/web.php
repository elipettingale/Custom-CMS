<?php

$router->get('login', [
    'uses' => 'SessionController@showLogin',
    'as' => 'admin.login.show'
]);

$router->post('login', [
    'uses' => 'SessionController@handleLogin',
    'as' => 'admin.login.handle'
]);

$router->get('logout', [
    'uses' => 'SessionController@handleLogout',
    'as' => 'admin.logout.handle'
]);
