<?php

namespace Modules\Settings\Repositories\Eloquent;

use EliPett\ListingBuilder\Services\BuildListing;
use Illuminate\Support\Collection;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Repositories\SettingRepository;

class EloquentSettingRepository implements SettingRepository
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function createNewInstance(): Setting
    {
        return new $this->setting;
    }

    public function create(string $key, string $value): Setting
    {
        $setting = $this->createNewInstance();
        $setting->key = $key;
        $setting->value = $value;
        $setting->save();

        return $setting;
    }

    public function update(Setting $setting, string $value): bool
    {
        $setting->value = $value;

        return $setting->save();
    }

    public function delete(Setting $setting): bool
    {
        return $setting->delete();
    }

    public function findOrFail(int $id): Setting
    {
        return $this->setting
            ->where('id', $id)
            ->firstOrFail();
    }

    public function findOrFailByKey(string $key): Setting
    {
        return $this->setting
            ->where('key', $key)
            ->firstOrFail();
    }

    public function findByKey(string $key): ?Setting
    {
        return $this->setting
            ->where('key', $key)
            ->first();
    }
}
