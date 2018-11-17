<?php

namespace Modules\Navigation\ValueObjects;

use Illuminate\View\View;
use Modules\Navigation\Contracts\NavItemContract;

class NavItem implements NavItemContract
{
    private $title;
    private $order;
    private $link;
    private $icon;
    private $visible;
    private $active;

    public function __construct(array $data)
    {
        $this->title = array_get($data, 'title');
        $this->order = array_get($data, 'order');
        $this->link = array_get($data, 'link');
        $this->icon = array_get($data, 'icon');
        $this->visible = array_get($data, 'visible');
        $this->active = array_get($data, 'active');
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function isActive(): bool
    {
        if (\is_callable($this->active)) {
            return (bool) \call_user_func($this->active);
        }

        return 0 === strpos(url()->current(), $this->link);
    }

    public function isVisible(): bool
    {
        if (\is_bool($this->visible)) {
            return $this->visible;
        }

        if (\is_callable($this->visible)) {
            return (bool) \call_user_func($this->visible);
        }

        return true;
    }

    private function view(): View
    {
        return view('navigation::navigation.nav-item', [
            'title' => $this->title,
            'link' => $this->link,
            'icon' => $this->icon,
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
