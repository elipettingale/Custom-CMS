<?php

namespace Modules\Core\ValueObjects;

class JsonBlob
{
    private $data;

    public function __construct(string $data)
    {
        $this->data = json_decode($data, true);
    }

    public function __get($name)
    {
        return array_get($this->data, $name);
    }
}
