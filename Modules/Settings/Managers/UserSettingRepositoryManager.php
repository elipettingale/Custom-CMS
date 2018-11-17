<?php

namespace Modules\Settings\Managers;

use Modules\Auth\Entities\User;
use Modules\Settings\Entities\UserSetting;
use Modules\Settings\Repositories\UserSettingRepository;

class UserSettingRepositoryManager
{
    private $userSettingRepository;

    public function __construct(UserSettingRepository $userSettingRepository)
    {
        $this->userSettingRepository = $userSettingRepository;
    }

    public function updateAll(User $user, array $data): bool
    {
        try {

            foreach ($data as $key => $value) {
                $this->update($user, $key, $value);
            }

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function update(User $user, string $key, string $value): UserSetting
    {
        if ($setting = $this->userSettingRepository->findByKey($user, $key)) {
            if ($setting->value !== $value) {
                $this->userSettingRepository->update($setting, $value);
            }

            return $setting;
        }

        return $this->userSettingRepository->create($user, $key, $value);
    }
}
