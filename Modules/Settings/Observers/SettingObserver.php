<?php

namespace Modules\Settings\Observers;

use Modules\Audit\Services\Audit;
use Modules\Settings\Entities\Setting;

class SettingObserver
{
    public function saved(Setting $setting): void
    {
        Audit::auditable($setting)
            ->withMessage('settings::audit.setting.saved', [
                'key' => $setting->key
            ]);
    }
}
