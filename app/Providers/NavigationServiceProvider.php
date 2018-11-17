<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Audit\Entities\AuditLog;
use Modules\Auth\Entities\Role;
use Modules\Auth\Entities\User;
use Modules\Content\Entities\Page;
use Modules\Navigation\Services\Navigation;
use Modules\Navigation\Services\NavigationFactory;
use Modules\News\Entities\Post;
use Modules\News\Entities\PostCategory;
use Modules\Settings\Entities\Setting;

class NavigationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerAdminNavigation();
    }

    private function registerAdminNavigation()
    {
        /** @var Navigation $navigation */
        $navigation = app('admin-navigation');

        $navigation->registerItem(NavigationFactory::makeCollapsibleNavItem([
            'title' => 'Admin',
            'order' => 4,
            'icon' => 'fa-cog',
            'children' => [
                [
                    'title' => 'Users',
                    'link' => route('admin.users.index'),
                    'visible' => function() {
                        return gate()->check('list', User::class);
                    }
                ],
                [
                    'title' => 'Roles',
                    'link' => route('admin.roles.index'),
                    'visible' => function() {
                        return gate()->check('list', Role::class);
                    }
                ],
                [
                    'title' => 'Settings',
                    'link' => route('admin.settings.edit'),
                    'visible' => function() {
                        return gate()->check('edit', Setting::class);
                    }
                ],
                [
                    'title' => 'Audit Logs',
                    'link' => route('admin.audit-logs.index'),
                    'visible' => function() {
                        return gate()->check('list', AuditLog::class);
                    }
                ]
            ]
        ]));
    }
}
