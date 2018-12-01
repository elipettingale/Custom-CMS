<?php

namespace Modules\Core\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Joshbrw\LaravelPermissions\Traits\RegistersPermissions;
use Laravel\Telescope\Telescope;
use Modules\Auth\Entities\Role;
use Modules\Auth\Entities\User;
use Modules\Auth\Policies\RolePolicy;
use Modules\Auth\Policies\UserPolicy;
use Modules\Auth\Services\EntityPermissions;
use Modules\Core\Policies\TelescopePolicy;

class PermissionServiceProvider extends ServiceProvider
{
    use RegistersPermissions;

    public function boot(Gate $gate, EntityPermissions $entityPermissions)
    {
        $gate->policy(Telescope::class, TelescopePolicy::class);

        $entityPermissions->register('core', 'telescope', 'telescope', []);
    }
}
