<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Content\Services\Shortcodes;

class ShortcodeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /** @var Shortcodes $shortcodes */
        $shortcodes = app('wysiwyg-shortcodes');
    }
}
