<?php

namespace Modules\Media\ValueObjects;

use Spatie\MediaLibrary\Models\Media as SpatieMedia;

class Media
{
    private $media;
    private $defaults;

    public function __construct(?SpatieMedia $media, array $definition)
    {
        $this->media = $media;
        $this->defaults = array_get($definition, 'defaults');
    }

    public function isValidMedia(): bool
    {
        return $this->media instanceof SpatieMedia;
    }

    public function getUrl(string $conversion, bool $useDefault = false): ?string
    {
        if (!$this->media) {
            if ($useDefault) {
                return $this->getDefaultUrl($conversion);
            }

            return null;
        }

        return $this->media->getUrl($conversion);
    }

    private function getDefaultUrl(string $conversion): string
    {
        $default = array_get($this->defaults, $conversion, $this->defaults['*']);
        $path = explode('::', $default);

        if (\count($path) === 1) {
            return $path[0];
        }

        if ($path[0] === 'asset') {
            return asset($path[1]);
        }

        throw new \InvalidArgumentException('Invalid default url ' . $this->defaults['conversion']);
    }
}
