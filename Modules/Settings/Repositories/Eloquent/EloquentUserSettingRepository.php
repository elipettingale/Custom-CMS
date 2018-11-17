<?php

namespace Modules\Settings\Repositories\Eloquent;

use EliPett\ListingBuilder\Services\BuildListing;
use Illuminate\Support\Collection;
use Modules\Auth\Entities\User;
use Modules\Settings\Entities\UserSetting;
use Modules\Settings\Repositories\UserSettingRepository;

class EloquentUserSettingRepository implements UserSettingRepository
{
    private $userSetting;

    public function __construct(UserSetting $userSetting)
    {
        $this->userSetting = $userSetting;
    }

    public function createNewInstance(): UserSetting
    {
        return new $this->userSetting;
    }

    public function create(User $user, string $key, string $value): UserSetting
    {
        $userSetting = $this->createNewInstance();
        $userSetting->user_id = $user->id;
        $userSetting->key = $key;
        $userSetting->value = $value;
        $userSetting->save();

        return $userSetting;
    }

    public function update(UserSetting $userSetting, string $value): bool
    {
        $userSetting->value = $value;

        return $userSetting->save();
    }

    public function delete(UserSetting $userSetting): bool
    {
        return $userSetting->delete();
    }

    public function findOrFail(int $id): UserSetting
    {
        return $this->userSetting
            ->where('id', $id)
            ->firstOrFail();
    }

    public function findOrFailByKey(User $user , string $key): UserSetting
    {
        return $this->userSetting
            ->where('user_id', $user->id)
            ->where('key', $key)
            ->firstOrFail();
    }

    public function findByKey(User $user, string $key): ?UserSetting
    {
        return $this->userSetting
            ->where('user_id', $user->id)
            ->where('key', $key)
            ->first();
    }
}
