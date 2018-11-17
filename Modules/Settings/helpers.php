<?php

use Modules\Settings\Repositories\UserSettingRepository;
use Modules\Settings\Repositories\SettingRepository;

if (!function_exists('setting'))
{
    function setting(string $key)
    {
        if (!$setting = app(SettingRepository::class)->findByKey($key)) {
            return null;
        }

        return $setting->value;
    }
}

if (!function_exists('user_setting'))
{
    function user_setting(string $key)
    {
        if (!$setting = app(UserSettingRepository::class)->findByKey(current_user(), $key)) {
            return null;
        }

        return $setting->value;
    }
}
