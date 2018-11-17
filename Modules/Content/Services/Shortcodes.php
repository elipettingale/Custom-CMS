<?php

namespace Modules\Content\Services;

use Illuminate\Support\Collection;

class Shortcodes
{
    private $items;

    public function __construct()
    {
        $this->items = collect();
    }

    public function registerItem($item): void
    {
        if (\is_object($item)) {
            $this->items->push($item);
            return;
        }

        if (\class_exists($item)) {
            $this->items->push(new $item);
        }
    }

    public function registerItems(array $items): void
    {
        foreach ($items as $item) {
            $this->registerItem($item);
        }
    }

    public function getItems(): Collection
    {
        return $this->items;
    }
}
