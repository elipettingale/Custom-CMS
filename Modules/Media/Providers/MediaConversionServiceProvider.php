<?php

namespace Modules\Media\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Media\Services\MediaConversion;
use Modules\Media\Enums\MediaConversions as MediaConversionNames;
use Modules\Media\Services\MediaConversions;

class MediaConversionServiceProvider extends ServiceProvider
{
    /** @throws \Spatie\Image\Exceptions\InvalidManipulation */
    public function boot()
    {
        /** @var MediaConversions $mediaConversions */
        $mediaConversions = app(MediaConversions::class);

        $mediaConversions->registerConversion(
            MediaConversion::name(MediaConversionNames::THUMB)
                ->fit('crop', 400, 400)
                ->nonQueued()
        );

        $mediaConversions->registerConversion(
            MediaConversion::name(MediaConversionNames::WIDE)
                ->fit('crop', 1080, 540)
                ->nonQueued()
        );

        $mediaConversions->registerConversion(
            MediaConversion::name(MediaConversionNames::LETTERBOX)
                ->fit('crop', 1080, 270)
                ->nonQueued()
        );
    }
}
