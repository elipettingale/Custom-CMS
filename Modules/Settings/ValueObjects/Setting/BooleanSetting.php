<?php

namespace Modules\Settings\ValueObjects\Setting;

use Illuminate\View\View;
use Modules\Settings\ValueObjects\Setting;

class BooleanSetting extends Setting
{
    public function renderInput($value): View
    {
        return view('settings::admin.settings.partials.boolean', [
            'key' => $this->key,
            'value' => (boolean) $value
        ]);
    }
}
