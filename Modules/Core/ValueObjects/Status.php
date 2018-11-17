<?php

namespace Modules\Core\ValueObjects;

class Status
{
    public $key;

    public $label;
    public $text;
    public $background;

    public function __construct(string $key, array $data)
    {
        $this->key = $key;

        $this->label = array_get($data, 'label', 'Unknown');
        $this->text = array_get($data, 'text', 'white');
        $this->background = array_get($data, 'background', 'dark');
    }
}
