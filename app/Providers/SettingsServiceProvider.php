<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Settings\ValueObjects\Setting\BooleanSetting;
use Modules\Settings\ValueObjects\Setting\SelectSetting;

class SettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerSettings();
        $this->registerUserSettings();
    }

    private function registerSettings()
    {
        /** @var \Modules\Settings\Services\Settings $settings */
        $settings = app('settings');

        $settings->registerItem(new BooleanSetting([
            'name' => 'Maintenance Mode',
            'description' => 'Toggle maintenance mode to prevent access to the main website',
            'key' => 'maintenance_mode'
        ]));
    }

    private function registerUserSettings()
    {
        /** @var \Modules\Settings\Services\Settings $settings */
        $settings = app('user-settings');

        $settings->registerItem(new BooleanSetting([
            'name' => 'Live Validation',
            'description' => 'Toggle the display of "go live" validation rules',
            'key' => 'live_validation'
        ]));

        $settings->registerItem(new SelectSetting([
            'name' => 'Publish Mode',
            'description' => 'Set the publish mode to allow greater control over published entities',
            'key' => 'publish_mode',
            'options' => [
                'basic' => 'Basic',
                'advanced' => 'Advanced'
            ]
        ]));
    }
}
