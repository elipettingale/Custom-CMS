<?php

namespace Modules\News\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\News\Composers\LatestLivePostsComposer;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer([
            'dashboard::admin.dashboard.show',
            'news::frontend.post.latest'
        ], LatestLivePostsComposer::class);
    }
}
