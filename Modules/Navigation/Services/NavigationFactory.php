<?php

namespace Modules\Navigation\Services;

use Modules\Navigation\ValueObjects\CollapsibleNavItem;
use Modules\Navigation\ValueObjects\NavItem;

class NavigationFactory
{
    public static function make(array $items): array
    {
        $navigation = [];

        foreach($items as $item) {
            $navigation[] = self::makeNavItem($item);
        }

        return $navigation;
    }

    public static function makeNavItem(array $data)
    {
        if (isset($data['children'])) {
            return self::makeCollapsibleNavItem($data);
        }

        return new NavItem($data);
    }

    public static function makeCollapsibleNavItem(array $data)
    {
        $children = [];

        foreach (array_get($data, 'children') as $item) {
            $children[] = self::makeNavItem($item);
        }

        return new CollapsibleNavItem($data, $children);
    }
}
