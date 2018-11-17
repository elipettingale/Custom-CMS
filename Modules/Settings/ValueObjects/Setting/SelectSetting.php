<?php

namespace Modules\Settings\ValueObjects\Setting;

use Illuminate\View\View;
use Modules\Settings\ValueObjects\Setting;

class SelectSetting extends Setting
{
    public $options;

    public function __construct(array $data)
    {
        $this->options = array_get($data, 'options', []);

        parent::__construct($data);
    }

    public function renderInput($value): View
    {
        return view('settings::admin.settings.partials.select', [
            'key' => $this->key,
            'value' => (string) $value,
            'options' => $this->options
        ]);
    }
}
