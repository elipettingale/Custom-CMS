<?php

namespace Modules\Content\Shortcodes;

use Modules\Core\Contracts\Shortcode;

class HeroSlider implements Shortcode
{
    public function signature(): string
    {
        return 'hero_slider';
    }

    /**
     * @param string $args
     * @return string
     * @throws \Throwable
     */
    public function render(string $args): string
    {
        $slides = [];

        return view('content::frontend.hero-slider.show', [
            'slides' => $slides
        ])->render();
    }
}
