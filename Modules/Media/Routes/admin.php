<?php

$router->put('media', [
    'uses' => 'MediaController@replace',
    'as' => 'media.replace'
]);

$router->post('media/wysiwyg', [
    'uses' => 'MediaController@add',
    'as' => 'media.add'
]);
