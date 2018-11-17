<?php

namespace Modules\Content\ValueObjects;

class Shortcode
{
    private $key;
    private $value;

    public function __construct(string $key, callable $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey(): string
    {
        return '{' . $this->key . '}';
    }

    public function getValue()
    {
        return \call_user_func($this->value);
    }
}
