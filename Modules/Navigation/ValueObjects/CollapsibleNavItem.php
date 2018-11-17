<?php

namespace Modules\Navigation\ValueObjects;

use Illuminate\View\View;
use Modules\Navigation\Contracts\NavItemContract;

class CollapsibleNavItem implements NavItemContract
{
    private $title;
    private $order;
    private $icon;
    private $children;

    public function __construct(array $data, array $children)
    {
        $this->title = array_get($data, 'title');
        $this->order = array_get($data, 'order');
        $this->icon = array_get($data, 'icon');
        $this->children = $children;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function isActive(): bool
    {
        /** @var \Modules\Navigation\ValueObjects\NavItem $child */
        foreach ($this->children as $child) {
            if ($child->isActive()) { return true; }
        }

        return false;
    }

    public function isVisible(): bool
    {
        /** @var \Modules\Navigation\ValueObjects\NavItem $child */
        foreach ($this->children as $child) {
            if ($child->isVisible()) { return true; }
        }

        return false;
    }

    private function view(): View
    {
        return view('navigation::navigation.collapsible-nav-item', [
            'title' => $this->title,
            'icon' => $this->icon,
            'children' => $this->children,
            'isActive' => $this->isActive()
        ]);
    }

    /** @throws \Throwable */
    public function __toString(): string
    {
        if ($this->isVisible()) {
            return $this->view()->render();
        }

        return '';
    }
}
