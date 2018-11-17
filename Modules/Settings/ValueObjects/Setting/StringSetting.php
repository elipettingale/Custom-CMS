<?php

namespace Modules\Settings\ValueObjects\Setting;

use Illuminate\View\View;
use Modules\Settings\ValueObjects\Setting;

class StringSetting extends Setting
{
    public function renderInput($value): View
    {
        return view('settings::admin.settings.partials.string', [
            'key' => $this->key,
            'value' => (string) $value
        ]);
    }
}
