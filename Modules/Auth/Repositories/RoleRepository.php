<?php

namespace Modules\Auth\Repositories;

use Illuminate\Support\Collection;
use Modules\Auth\Entities\Role;

interface RoleRepository
{
    public function createNewInstance(): Role;
    public function create(array $data): Role;
    public function update(Role $role, array $data): bool;
    public function updatePermissions(Role $role, array $data): bool;
    public function delete(Role $role): bool;

    public function findOrFail(int $id): Role;

    public function getAll(): Collection;
    public function getAdminListing(): Collection;
}
