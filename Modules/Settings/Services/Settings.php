<?php

namespace Modules\Settings\Services;

use Illuminate\Support\Collection;
use Modules\Settings\ValueObjects\Setting;

class Settings
{
    private $settings;

    public function __construct()
    {
        $this->settings = collect();
    }

    public function registerItem(Setting $setting): void
    {
        $this->settings->push($setting);
    }

    public function getSettings(): Collection
    {
        return $this->settings;
    }

    public function getItemByKey(string $key): ?Setting
    {
        return $this->settings
            ->where('key', $key)
            ->first();
    }
}
