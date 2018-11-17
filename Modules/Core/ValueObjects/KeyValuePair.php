<?php

namespace Modules\Core\ValueObjects;

class KeyValuePair
{
    public $key;
    public $value;

    public function __construct(?string $key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}
