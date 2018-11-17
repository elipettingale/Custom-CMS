<?php

namespace App\Http\Requests;

use Illuminate\Http\Request as LaravelRequest;

class Request extends LaravelRequest
{
    public function morph(string $key, $default = null)
    {
        if (!$this->exists("{$key}_type") || !$this->exists("{$key}_id")) {
            return $default;
        }

        return $this->morphEntity($this->get("{$key}_type"), $this->get("{$key}_id"));
    }

    private function morphEntity(string $type, int $id)
    {
        try {
            return $type::find($id);
        } catch (\Exception $exception) {
            return null;
        }
    }
}
