<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Media\Services\MediaConversion;
use Modules\Media\Services\MediaConversions;

class MediaConversionServiceProvider extends ServiceProvider
{
    /** @throws \Spatie\Image\Exceptions\InvalidManipulation */
    public function boot()
    {
        /** @var MediaConversions $mediaConversions */
        $mediaConversions = app(MediaConversions::class);

        $mediaConversions->registerConversion(
            MediaConversion::name('thumb')
                ->fit('crop', 400, 400)
                ->nonQueued()
        );
    }
}
