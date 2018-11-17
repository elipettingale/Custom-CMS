<?php

namespace Modules\Navigation\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Navigation\Services\Breadcrumbs;
use Modules\Navigation\Services\Navigation;

class NavigationServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    public function register()
    {
        $this->app->singleton('admin-navigation', Navigation::class);
        $this->app->singleton('main-breadcrumbs', Breadcrumbs::class);
        $this->app->singleton('frontend-navigation', Navigation::class);
    }

    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('navigation.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'navigation'
        );
    }

    public function registerViews()
    {
        $viewPath = resource_path('views/modules/navigation');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/navigation';
        }, \Config::get('view.paths')), [$sourcePath]), 'navigation');
    }

    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/navigation');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'navigation');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'navigation');
        }
    }

    public function provides()
    {
        return [];
    }
}
