<?php

namespace Modules\Navigation\Services;

use Illuminate\Support\Collection;
use Modules\Navigation\Contracts\NavItemContract;

class Navigation
{
    private $items;

    public function __construct()
    {
        $this->items = collect();
    }

    public function registerItem(NavItemContract $item): void
    {
        $this->items->push($item);
    }

    public function registerItems(array $items): void
    {
        foreach ($items as $item) {
            $this->registerItem($item);
        }
    }

    public function getItems(): Collection
    {
        return $this->items->sortBy(function(NavItemContract $item) {
            return $item->getOrder();
        });
    }
}
