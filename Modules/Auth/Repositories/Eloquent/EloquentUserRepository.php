<?php

namespace Modules\Auth\Repositories\Eloquent;

use EliPett\ListingBuilder\Services\BuildListing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Auth\Entities\User;
use Modules\Auth\Repositories\UserRepository;
use Modules\Auth\Scopes\WhereHasRole;

class EloquentUserRepository implements UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createNewInstance(): User
    {
        return new $this->user;
    }

    public function create(array $data): User
    {
        $user = $this->createNewInstance();
        $user->fill($data);
        $user->password = app('hash')->make($data['password']);
        $user->save();

        return $user;
    }

    public function update(User $user, array $data): bool
    {
        $user->fill($data);

        return $user->save();
    }

    public function updatePassword(User $user, string $password): bool
    {
        $user->password = app('hash')->make($password);

        return $user->save();
    }

    public function syncRoles(User $user, array $roles): bool
    {
        $user->roles()->sync($roles);

        return $user->save();
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function findOrFail(int $id): User
    {
        return $this->user
            ->where('id', $id)
            ->firstOrFail();
    }

    public function findOrFailByEmail(string $email): User
    {
        return $this->user
            ->where('email', $email)
            ->firstOrFail();
    }

    public function getAll(): Collection
    {
        return $this->user
            ->get();
    }

    public function getAdminListing(): Collection
    {
        return BuildListing::from($this->user)
            ->ifEqual('true', [
                'is_active' => 'scopeWhereActive'
            ])
            ->ifEqual('false', [
                'is_active' => 'scopeWhereInactive'
            ])
            ->ifSet([
                'role_id' => WhereHasRole::class
            ])
            ->get();
    }
}
