<?php

namespace Modules\News\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Content\Services\Shortcodes;
use Modules\Content\ValueObjects\Shortcode;
use Modules\News\Shortcodes\LatestPostsShortcode;

class ShortcodeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /** @var Shortcodes $shortcodes */
        $shortcodes = app('wysiwyg-shortcodes');

        $shortcodes->registerItem(LatestPostsShortcode::class);
    }
}
