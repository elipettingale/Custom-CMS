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
     * @param string $content
     * @return string
     * @throws \Throwable
     */
    public function render(string $content): string
    {
        $slides = [];

        if (preg_match_all(shortcode_pattern('slide'), $content, $matches)) {
            foreach ($matches[0] as $index => $pattern) {
                $slides[] = $matches[1][$index];
            }
        }

        return view('content::frontend.hero-slider.show', [
            'slides' => $slides
        ])->render();
    }
}
