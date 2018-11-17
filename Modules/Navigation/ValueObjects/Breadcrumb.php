<?php

namespace Modules\Navigation\ValueObjects;

use Illuminate\View\View;

class Breadcrumb
{
    private $title;
    private $link;
    private $isActive;

    public function __construct(string $title, ?string $link)
    {
        $this->title = $title;
        $this->link = $link;
        $this->isActive = false;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    private function view(): View
    {
        if ($this->isActive) {
            return view('navigation::breadcrumbs.active-breadcrumb', [
                'title' => $this->title
            ]);
        }

        return view('navigation::breadcrumbs.breadcrumb', [
            'title' => $this->title,
            'link' => $this->link
        ]);
    }

    /** @throws \Throwable */
    public function __toString()
    {
        return $this->view()->render();
    }
}
