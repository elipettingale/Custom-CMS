<?php

namespace Modules\Content\ValueObjects;

use Modules\Core\Contracts\Shortcode as ShortcodeContract;

class Shortcode implements ShortcodeContract
{
    private $pattern;
    private $render;

    public function __construct(string $pattern, callable $render)
    {
        $this->pattern = $pattern;
        $this->render = $render;
    }

    public function pattern(): string
    {
        return $this->pattern;
    }

    public function render(array $args): string
    {
        return \call_user_func($this->render, $args);
    }
}
