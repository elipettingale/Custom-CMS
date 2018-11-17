<?php

namespace Modules\Seo\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Joshbrw\LaravelPermissions\Permission;
use Joshbrw\LaravelPermissions\Traits\RegistersPermissions;
use Modules\Auth\Services\EntityPermissions;
use Modules\Seo\Entities\SeoProfile;
use Modules\Seo\Policies\SeoProfilePolicy;

class PermissionServiceProvider extends ServiceProvider
{
    use RegistersPermissions;

    public function boot(Gate $gate, EntityPermissions $entityPermissions)
    {
        $gate->policy(SeoProfile::class, SeoProfilePolicy::class);

        $entityPermissions->register('seo', 'seo-profile', 'seo-profiles', [
            'edit'
        ]);
    }
}
