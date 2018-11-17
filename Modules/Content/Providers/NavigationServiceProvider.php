<?php

namespace Modules\Content\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Content\Entities\Page;
use Modules\Navigation\Services\Navigation;
use Modules\Navigation\Services\NavigationFactory;

class NavigationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerAdmin();
        $this->registerFrontend();
    }

    private function registerAdmin()
    {
        /** @var Navigation $navigation */
        $navigation = app('admin-navigation');

        $navigation->registerItem(NavigationFactory::makeCollapsibleNavItem([
            'title' => 'Content',
            'order' => 2,
            'icon' => 'fa-desktop',
            'children' => [
                [
                    'title' => 'Pages',
                    'link' => route('admin.pages.index'),
                    'visible' => function() {
                        return gate()->check('list', Page::class);
                    }
                ]
            ]
        ]));
    }

    private function registerFrontend()
    {
        /** @var Navigation $navigation */
        $navigation = app('frontend-navigation');

        $navigation->registerItem(NavigationFactory::makeNavItem([
            'title' => 'Home',
            'order' => 0,
            'link' => '/',
            'active' => function() {
                return url()->current() === route('frontend.pages.home');
            }
        ]));
    }
}
