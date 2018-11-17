<?php

namespace Modules\Media\Services;

use Spatie\MediaLibrary\Conversion\Conversion;

class MediaConversions
{
    private $conversions = [];

    public function registerConversion(Conversion $conversion): void
    {
        $this->conversions[$conversion->getName()] = $conversion;
    }

    public function getConversions(): array
    {
        return $this->conversions;
    }
}
