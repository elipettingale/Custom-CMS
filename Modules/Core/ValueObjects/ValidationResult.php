<?php

namespace Modules\Core\ValueObjects;

class ValidationResult
{
    public $key;
    public $label;
    public $valid;

    public function __construct($key, $label)
    {
        $this->key = $key;
        $this->label = $label;
        $this->valid = false;
    }

    public function setValid(bool $valid): void
    {
        $this->valid = $valid;
    }
}
