<?php

namespace Modules\Navigation\Providers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot(Factory $view)
    {
        $view->composer([
            'partials.admin.navigation.side'
        ], function (View $view) {
            $view->with('navItems', app('admin-navigation')->getItems());
        });

        $view->composer([
            'partials.admin.header'
        ], function (View $view) {
            $view->with('breadcrumbs', app('main-breadcrumbs')->getItems());
        });

        $view->composer([
            'partials.frontend.header'
        ], function (View $view) {
            $view->with('navItems', app('frontend-navigation')->getItems());
        });
    }
}
