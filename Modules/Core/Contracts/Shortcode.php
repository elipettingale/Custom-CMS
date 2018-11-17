<?php

namespace Modules\Core\Contracts;

interface Shortcode
{
    public function pattern(): string;
    public function render(array $args): string;
}
