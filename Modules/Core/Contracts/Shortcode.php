<?php

namespace Modules\Core\Contracts;

interface Shortcode
{
    public function signature(): string;
    public function render(string $content): string;
}
