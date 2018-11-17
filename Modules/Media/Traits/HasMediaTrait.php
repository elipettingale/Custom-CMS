<?php

namespace Modules\Media\Traits;

use Modules\Media\Services\MediaConversions;
use Modules\Media\Services\MediaFactory;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait as SpatieHasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

trait HasMediaTrait
{
    use SpatieHasMediaTrait;

    public function registerMediaConversions(Media $media = null): void
    {
        $mediaConversions = app(MediaConversions::class)->getConversions();

        foreach ($this->mediaDefinitions() as $key => $definition) {
            foreach ($definition['conversions'] as $name) {
                if (!isset($mediaConversions[$name])) {
                    throw new \InvalidArgumentException("Conversion '$name' could not be found. Ensure it has been registered");
                }

                $this->mediaConversions[] = $mediaConversions[$name]->performOnCollections($key);
            }
        }
    }

    public function castToMedia(string $key)
    {
        return MediaFactory::make($this->getMedia($key), $key, $this->mediaDefinitions()[$key]);
    }
}
