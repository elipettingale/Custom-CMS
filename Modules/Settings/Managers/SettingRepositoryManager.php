<?php

namespace Modules\Settings\Managers;

use Modules\Settings\Entities\Setting;
use Modules\Settings\Repositories\SettingRepository;

class SettingRepositoryManager
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function updateAll(array $data): bool
    {
        try {

            foreach ($data as $key => $value) {
                $this->update($key, $value);
            }

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function update(string $key, string $value): Setting
    {
        if ($setting = $this->settingRepository->findByKey($key)) {
            if ($setting->value !== $value) {
                $this->settingRepository->update($setting, $value);
            }

            return $setting;
        }

        return $this->settingRepository->create($key, $value);
    }
}
