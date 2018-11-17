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
        preg_match_all(shortcode_pattern('slide'), $args, $matches);
        $slides = $matches[1];

        return view('content::frontend.hero-slider.show', [
            'slides' => $slides
        ])->render();
    }
}
