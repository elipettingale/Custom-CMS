<?php

$router->put('media/add', [
    'uses' => 'MediaController@add',
    'as' => 'media.add'
]);

$router->put('media/replace', [
    'uses' => 'MediaController@replace',
    'as' => 'media.replace'
]);

$router->post('media/wysiwyg', [
    'uses' => 'MediaController@add',
    'as' => 'media.add'
]);
