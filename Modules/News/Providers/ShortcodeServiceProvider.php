<?php

namespace Modules\News\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Content\Services\Shortcodes;
use Modules\Content\ValueObjects\Shortcode;

class ShortcodeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /** @var Shortcodes $shortcodes */
        $shortcodes = app('wysiwyg-shortcodes');

        $shortcodes->registerItem(new Shortcode('latest_(?<count>[^\}]+)_posts', function(array $args) {
            return view('news::frontend.post.latest', [
                'count' => $args['count']
            ]);
        }));
    }
}
