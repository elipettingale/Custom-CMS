<?php

namespace Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Navigation\Services\NavigationFactory;
use Modules\Navigation\Services\Navigation;

class NavigationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerAdminNavigation();
    }

    private function registerAdminNavigation()
    {
        /** @var Navigation $navigation */
        $navigation = app('admin-navigation');

        $navigation->registerItem(NavigationFactory::makeNavItem([
            'title' => 'Dashboard',
            'order' => 1,
            'link' => route('admin.dashboard.show'),
            'icon' => 'fa-tachometer-alt',
            'visible' => true,
            'active' => function() {
                return request()->route()->getName() === 'admin.dashboard.show';
            }
        ]));
    }
}
