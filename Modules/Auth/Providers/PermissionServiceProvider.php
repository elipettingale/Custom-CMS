<?php

namespace Modules\Auth\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Joshbrw\LaravelPermissions\Traits\RegistersPermissions;
use Modules\Auth\Entities\Role;
use Modules\Auth\Entities\User;
use Modules\Auth\Policies\RolePolicy;
use Modules\Auth\Policies\UserPolicy;
use Modules\Auth\Services\EntityPermissions;

class PermissionServiceProvider extends ServiceProvider
{
    use RegistersPermissions;

    public function boot(Gate $gate, EntityPermissions $entityPermissions)
    {
        $gate->policy(User::class, UserPolicy::class);

        $entityPermissions->register('auth', 'user', 'users', [
            'list', 'create', 'edit', 'delete', 'impersonate'
        ]);

        $gate->policy(Role::class, RolePolicy::class);

        $entityPermissions->register('auth', 'role', 'roles', [
            'list', 'create', 'edit', 'delete'
        ]);
    }
}
