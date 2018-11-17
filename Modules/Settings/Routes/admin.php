<?php

$router->get('settings', [
    'uses' => 'SettingsController@edit',
    'as' => 'settings.edit'
]);

$router->put('settings', [
    'uses' => 'SettingsController@update',
    'as' => 'settings.update'
]);
