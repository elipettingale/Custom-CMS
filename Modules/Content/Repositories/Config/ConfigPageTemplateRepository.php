<?php

namespace Modules\Content\Repositories\Config;

use Modules\Core\ValueObjects\KeyValuePair;
use Illuminate\Support\Collection;
use Modules\Content\Repositories\PageTemplateRepository;

class ConfigPageTemplateRepository implements PageTemplateRepository
{
    public function createNewInstance(): KeyValuePair
    {
        return new KeyValuePair(null, null);
    }

    public function findOrNew(?string $key): KeyValuePair
    {
        $value = config("content.page-templates.$key");

        if (!$value) {
            return $this->createNewInstance();
        }

        return new KeyValuePair($key, $value);
    }

    public function getAll(): Collection
    {
        $data = collect();
        $items = config('content.page-templates', []);

        foreach ($items as $key => $value) {
            $data->push(new KeyValuePair($key, $value));
        }

        return $data;
    }
}
