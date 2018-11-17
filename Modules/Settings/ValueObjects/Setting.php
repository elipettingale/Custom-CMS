<?php

namespace Modules\Settings\ValueObjects;

use Illuminate\View\View;
use Modules\Settings\Repositories\SettingRepository;

abstract class Setting
{
    public $name;
    public $description;
    public $key;

    public function __construct(array $data)
    {
        $this->name = array_get($data, 'name');
        $this->description = array_get($data, 'description');
        $this->key = array_get($data, 'key');
    }

    abstract public function renderInput($value): View;
}
