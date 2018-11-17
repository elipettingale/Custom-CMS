<?php

namespace Modules\Auth\Repositories\Eloquent;

use EliPett\ListingBuilder\Services\BuildListing;
use Modules\Auth\Entities\Role;
use Modules\Auth\Repositories\RoleRepository;
use Illuminate\Support\Collection;

class EloquentRoleRepository implements RoleRepository
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function createNewInstance(): Role
    {
        return new $this->role;
    }

    public function create(array $data): Role
    {
        $role = $this->createNewInstance();
        $role->fill($data);
        $role->save();

        return $role;
    }

    public function update(Role $role, array $data): bool
    {
        $role->fill($data);

        return $role->save();
    }

    public function updatePermissions(Role $role, array $data): bool
    {
        $role->permissions = array_merge($role->permissions, $data);

        return $role->save();
    }

    public function delete(Role $role): bool
    {
        return $role->delete();
    }

    public function findOrFail(int $id): Role
    {
        return $this->role
            ->where('id', $id)
            ->firstOrFail();
    }

    public function getAll(): Collection
    {
        return $this->role
            ->get();
    }

    public function getAdminListing(): Collection
    {
        return BuildListing::from($this->role)
            ->get();
    }
}
