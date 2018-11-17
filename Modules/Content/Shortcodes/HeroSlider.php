<?php

namespace Modules\Content\Shortcodes;

use Modules\Core\Contracts\Shortcode;

class HeroSlider implements Shortcode
{
    public function pattern(): string
    {
        return 'hero_slider\}(?<slides>.*)\{hero_slider';
    }

    /**
     * @param array $args
     * @return string
     * @throws \Throwable
     */
    public function render(array $args): string
    {
        $slides = explode(',', $args['slides']);

        return view('content::frontend.hero-slider.show', [
            'slides' => $slides
        ])->render();
    }
}
