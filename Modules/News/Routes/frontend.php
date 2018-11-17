<?php

$router->get('news', [
    'uses' => 'PostController@index',
    'as' => 'posts.index'
]);

$router->get('news/{slug}', [
    'uses' => 'PostController@show',
    'as' => 'posts.show'
]);
