<?php

namespace Modules\Content\ValueObjects;

use Modules\Core\Contracts\Shortcode as ShortcodeContract;

class Shortcode implements ShortcodeContract
{
    private $signature;
    private $render;

    public function __construct(string $signature, callable $render)
    {
        $this->signature = $signature;
        $this->render = $render;
    }

    public function signature(): string
    {
        return $this->signature;
    }

    public function render(string $args): string
    {
        return \call_user_func($this->render, $args);
    }
}
