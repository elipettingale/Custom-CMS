<?php

namespace Modules\Content\Services;

class Shortcodes
{
    private $items = [];

    public function registerItem($item): void
    {
        $this->items[] = $item;
    }

    public function registerItems(array $items): void
    {
        $this->items = array_merge($this->items, $items);
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
