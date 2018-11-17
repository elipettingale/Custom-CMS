<?php

namespace Modules\Content\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Joshbrw\LaravelPermissions\Traits\RegistersPermissions;
use Modules\Auth\Services\EntityPermissions;
use Modules\Content\Entities\Page;
use Modules\Content\Policies\PagePolicy;

class PermissionServiceProvider extends ServiceProvider
{
    use RegistersPermissions;

    public function boot(Gate $gate, EntityPermissions $entityPermissions)
    {
        $gate->policy(Page::class, PagePolicy::class);

        $entityPermissions->register('content', 'page', 'pages', [
            'list', 'create', 'edit', 'delete', 'mark-as-live', 'mark-as-draft', 'preview'
        ]);
    }
}
