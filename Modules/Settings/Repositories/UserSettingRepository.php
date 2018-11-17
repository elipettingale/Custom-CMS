<?php

namespace Modules\Settings\Repositories;

use Illuminate\Support\Collection;
use Modules\Auth\Entities\User;
use Modules\Settings\Entities\UserSetting;

interface UserSettingRepository
{
    public function createNewInstance(): UserSetting;
    public function create(User $user, string $key, string $value): UserSetting;
    public function update(UserSetting $userSetting, string $value): bool;
    public function delete(UserSetting $userSetting): bool;

    public function findOrFail(int $id): UserSetting;
    public function findOrFailByKey(User $user, string $key): UserSetting;
    public function findByKey(User $user, string $key): ?UserSetting;
}
