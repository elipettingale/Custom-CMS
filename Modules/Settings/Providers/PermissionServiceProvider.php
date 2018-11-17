<?php

namespace Modules\Settings\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Joshbrw\LaravelPermissions\Permission;
use Joshbrw\LaravelPermissions\Traits\RegistersPermissions;
use Modules\Auth\Services\EntityPermissions;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Policies\SettingPolicy;

class PermissionServiceProvider extends ServiceProvider
{
    use RegistersPermissions;

    public function boot(Gate $gate, EntityPermissions $entityPermissions)
    {
        $gate->policy(Setting::class, SettingPolicy::class);

        $entityPermissions->register('settings', 'setting', 'settings', [
            'edit'
        ]);

        $this->registerPermission('Advanced', 'settings.maintenance-access', 'Maintenance Access', 'Can access the site during maintenance mode');
    }
}
