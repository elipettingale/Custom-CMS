<?php

namespace Modules\Auth\Services;

use Joshbrw\LaravelPermissions\Permission;
use Joshbrw\LaravelPermissions\Traits\RegistersPermissions;

class EntityPermissions
{
    use RegistersPermissions;

    public function register(string $module, string $entity, string $entityPlural, array $permissions): void
    {
        $this->registerPermission('Basic',
            lower_hyphen_case($module) . '.' . lower_hyphen_case($entity) . '.all',
            'All ' . upper_case($entity) . ' Permissions',
            'Has all ' . upper_case($entity) . ' permissions'
        );

        foreach ($permissions as $permission) {
            $this->registerPermission('Advanced',
                lower_hyphen_case($module) . '.' . lower_hyphen_case($entity) . '.' . lower_hyphen_case($permission),
                upper_case($permission) . ' ' . upper_case($entityPlural),
                'Can ' . lower_case($permission) . ' ' . upper_case($entityPlural)
            );
        }
    }
}
