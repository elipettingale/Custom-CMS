<?php

use Illuminate\Routing\Router;

if (!app()->routesAreCached()) {

    $router = app('router');
    $namespace = 'Modules\Navigation\Http\Controllers';

}
