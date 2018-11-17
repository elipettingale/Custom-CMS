<?php

namespace Modules\Navigation\Contracts;

interface NavItemContract
{
    public function getOrder(): int;
    public function isActive(): bool;
    public function isVisible(): bool;
    public function __toString(): string;
}
