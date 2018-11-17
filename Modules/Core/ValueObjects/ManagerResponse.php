<?php

namespace Modules\Core\ValueObjects;

class ManagerResponse
{
    private $success = true;
    private $errors = [];
    private $data = [];

    public function wasSuccessful(): bool
    {
        return $this->success;
    }

    public function setError(string $code): void
    {
        $this->success = false;
        $this->errors[] = $code;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setData(string $key, $data): void
    {
        if (strpos($key, '[]')) {
            $key = str_replace('[]', '', $key);

            if (!isset($this->data[$key])) {
                $this->data[$key] = [];
            }

            $this->data[$key][] = $data;
        } else {
            $this->data[$key] = $data;
        }
    }

    public function getData(?string $key)
    {
        if (!$key) {
            return $this->data;
        }

        return $this->data[$key];
    }
}
