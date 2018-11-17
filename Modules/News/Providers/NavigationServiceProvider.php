<?php

namespace Modules\News\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Navigation\Services\NavigationFactory;
use Modules\News\Entities\Post;
use Modules\News\Entities\PostCategory;

class NavigationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerAdmin();
        $this->registerFrontend();
    }

    private function registerAdmin()
    {
        $navigation = app('admin-navigation');

        $navigation->registerItem(NavigationFactory::makeCollapsibleNavItem([
            'title' => 'News',
            'order' => 3,
            'icon' => 'fa-newspaper',
            'children' => [
                [
                    'title' => 'Posts',
                    'link' => route('admin.posts.index'),
                    'visible' => function() {
                        return gate()->check('list', Post::class);
                    }
                ],
                [
                    'title' => 'Categories',
                    'link' => route('admin.post-categories.index'),
                    'visible' => function() {
                        return gate()->check('list', PostCategory::class);
                    }
                ]
            ]
        ]));
    }

    public function registerFrontend()
    {
        $navigation = app('frontend-navigation');

        $navigation->registerItem(NavigationFactory::makeNavItem([
            'title' => 'News',
            'order' => 1,
            'visible' => true,
            'link' => route('frontend.posts.index')
        ]));
    }
}
