<?php

namespace Modules\News\Providers;

use Modules\Core\Observers\EntityCacheObserver;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\News\Entities\Post;
use Modules\News\Entities\PostCategory;
use Modules\News\Repositories\Eloquent\EloquentPostCategoryRepository;
use Modules\News\Repositories\Eloquent\EloquentPostRepository;
use Modules\News\Repositories\PostCategoryRepository;
use Modules\News\Repositories\PostRepository;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->registerObservers();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepository::class, EloquentPostRepository::class);
        $this->app->bind(PostCategoryRepository::class, EloquentPostCategoryRepository::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('news.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'news'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/news');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/news';
        }, \Config::get('view.paths')), [$sourcePath]), 'news');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/news');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'news');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'news');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Register entity observers.
     */
    public function registerObservers()
    {
        PostCategory::observe(EntityCacheObserver::class);
        Post::observe(EntityCacheObserver::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
