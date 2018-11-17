<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Media\Http\Controllers\Api',
    'middleware' => ['web', 'auth'],
    'prefix' => 'api',
    'as' => 'api.'
], function (Router $router) {

    $router->post('media', [
        'uses' => 'MediaController@add',
        'as' => 'media.add'
    ]);

});
