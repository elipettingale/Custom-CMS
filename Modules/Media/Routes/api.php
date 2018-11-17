<?php

$router->post('media', [
    'uses' => 'MediaController@add',
    'as' => 'media.add'
]);
