<?php

namespace Modules\Auth\Repositories;

use Illuminate\Support\Collection;
use Modules\Auth\Entities\User;

interface UserRepository
{
    public function createNewInstance(): User;
    public function create(array $data): User;
    public function update(User $user, array $data): bool;
    public function updatePassword(User $user, string $password): bool;
    public function syncRoles(User $user, array $roles): bool;
    public function delete(User $user): bool;

    public function findOrFail(int $id): User;

    public function getAll(): Collection;
    public function getAdminListing(): Collection;
}
