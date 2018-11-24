<?php

namespace Modules\Content\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Content\Services\Shortcodes;
use Modules\Content\Shortcodes\HeroSlider;
use Modules\Content\Shortcodes\Separator;
use Modules\Content\ValueObjects\Shortcode;

class ShortcodeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /** @var Shortcodes $shortcodes */
        $shortcodes = app('wysiwyg-shortcodes');

        $shortcodes->registerItems([
            HeroSlider::class,
            Separator::class
        ]);
    }
}
