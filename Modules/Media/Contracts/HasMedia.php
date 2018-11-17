<?php

namespace Modules\Media\Contracts;

use Spatie\MediaLibrary\HasMedia\HasMedia as SpatieHasMedia;

interface HasMedia extends SpatieHasMedia
{
    public function mediaDefinitions(): array;
    public function castToMedia(string $key);
}
