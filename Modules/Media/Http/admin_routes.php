<?php

use Illuminate\Routing\Router;

$router = app('router');

$router->group([
    'namespace' => 'Modules\Media\Http\Controllers\Admin',
    'middleware' => ['web', 'auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (Router $router) {

    $router->put('media', [
        'uses' => 'MediaController@replace',
        'as' => 'media.replace'
    ]);

    $router->post('media/wysiwyg', [
        'uses' => 'MediaController@add',
        'as' => 'media.add'
    ]);

});
