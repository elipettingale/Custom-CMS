<?php

namespace Modules\Content\Shortcodes;

use Modules\Core\Contracts\Shortcode;

class HeroSlider implements Shortcode
{
    public function pattern(): string
    {
        return 'hero_slider';
    }

    /**
     * @param array $args
     * @return string
     * @throws \Throwable
     */
    public function render(array $args): string
    {
        return view('content::frontend.hero-slider.show', [
            'slides' => [
                [
                    'image' => stock_image_path(7),
                    'title' => 'Necessitatibus Incidunt',
                    'text' => 'Nulla sunt nisi qui non.'
                ],
                [
                    'image' => stock_image_path(8),
                    'title' => 'Expedita Est',
                    'text' => 'Quia expedita est autem in molestiae.'
                ],
                [
                    'image' => stock_image_path(9),
                    'title' => 'Error Corrupti',
                    'text' => 'Minus debitis eum veritatis et enim nobis.'
                ]
            ]
        ])->render();
    }
}
