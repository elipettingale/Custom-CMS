<?php

namespace Modules\Media\Services;

use Spatie\MediaLibrary\Conversion\Conversion;

class MediaConversion
{
    public static function name(string $name): Conversion
    {
        return new Conversion($name);
    }
}
