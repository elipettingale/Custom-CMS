<?php

namespace Modules\Auth\Managers;

use Modules\Core\Services\Manager;
use Modules\Core\ValueObjects\ManagerResponse;
use Modules\Auth\Entities\Role;
use Modules\Auth\Repositories\RoleRepository;

class RoleManager extends Manager
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function create(array $data): ManagerResponse
    {
        $this->begin();

        $role = $this->call(
            $this->roleRepository->create($data), 'role'
        );

        $this->call(
            $this->updatePermissions($role, $data)
        );

        return $this->complete();
    }

    public function update(Role $role, array $data): ManagerResponse
    {
        $this->begin();

        $this->call(
            $this->roleRepository->update($role, $data)
        );

        $this->call(
            $this->updatePermissions($role, $data)
        );

        return $this->complete();
    }

    public function updatePermissions(Role $role, array $data): bool
    {
        $permissions = [];

        foreach (array_get($data, 'permissions', []) as $key => $value) {
            if ($value === 'allow') {
                $permissions[$key] = true;
            } else {
                $permissions[$key] = false;
            }
        }

        return $this->roleRepository->updatePermissions($role, $permissions);
    }
}
