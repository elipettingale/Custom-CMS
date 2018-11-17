<?php

$router->get('/', [
   'uses' => 'DashboardController@show',
   'as' => 'dashboard.show'
]);
