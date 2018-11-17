<?php

namespace Modules\Audit\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Joshbrw\LaravelPermissions\Traits\RegistersPermissions;
use Modules\Audit\Entities\AuditLog;
use Modules\Audit\Policies\AuditLogPolicy;
use Modules\Auth\Services\EntityPermissions;

class PermissionServiceProvider extends ServiceProvider
{
    use RegistersPermissions;

    public function boot(Gate $gate, EntityPermissions $entityPermissions)
    {
        $gate->policy(AuditLog::class, AuditLogPolicy::class);

        $entityPermissions->register('audit', 'audit-log', 'audit-logs', [
            'list', 'show'
        ]);
    }
}
