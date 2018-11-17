<?php

namespace Modules\Settings\Repositories;

use Illuminate\Support\Collection;
use Modules\Settings\Entities\Setting;

interface SettingRepository
{
    public function createNewInstance(): Setting;
    public function create(string $key, string $value): Setting;
    public function update(Setting $setting, string $value): bool;
    public function delete(Setting $setting): bool;

    public function findOrFail(int $id): Setting;
    public function findOrFailByKey(string $key): Setting;
    public function findByKey(string $key): ?Setting;
}
