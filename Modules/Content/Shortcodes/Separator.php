<?php

namespace Modules\Content\Shortcodes;

use Modules\Core\Contracts\Shortcode;

class Separator implements Shortcode
{
    public function signature(): string
    {
        return 'separator';
    }

    private function getHeight($height)
    {
        if (strpos($height, 'px') | strpos($height, 'rem')) {
            return $height;
        }

        return "{$height}px";
    }

    public function render(string $height): string
    {
        return "<span style='display: block; margin-bottom: {$this->getHeight($height)}'></span>";
    }
}
