<?php

namespace Modules\Navigation\Services;

class Breadcrumbs
{
    private $items = [];

    public function registerItem($item): void
    {
        $this->items[] = $item;
    }

    public function getItems(): array
    {
        if (!empty($this->items)) {
            end($this->items)->setIsActive(true);
        }

        return $this->items;
    }
}
