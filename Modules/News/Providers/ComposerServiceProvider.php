<?php

namespace Modules\News\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;
use Modules\News\Composers\LatestLivePostsComposer;
use Modules\News\Composers\PostCategoriesComposer;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(Factory $view)
    {
        $view->composer([
            'dashboard::admin.dashboard.show',
            'news::frontend.post.latest'
        ], LatestLivePostsComposer::class);

        $view->composer([
            'news::frontend.post.partials.post-categories'
        ], PostCategoriesComposer::class);
    }
}
