<?php

namespace Modules\Core\Traits;

use Modules\Core\Enums\CarbonFormats;
use Carbon\Carbon;

trait PresentsTimestamps
{
    public function timestamp(string $attribute)
    {
        if (!$this->entity->$attribute instanceof Carbon) {
            return null;
        }

        return $this->entity->$attribute->format(CarbonFormats::TIMESTAMP);
    }

    public function date(string $attribute)
    {
        if (!$this->entity->$attribute instanceof Carbon) {
            return null;
        }

        return $this->entity->$attribute->format(CarbonFormats::DATE);
    }

    public function time(string $attribute)
    {
        if (!$this->entity->$attribute instanceof Carbon) {
            return null;
        }

        return $this->entity->$attribute->format(CarbonFormats::TIME);
    }

    public function dateTime(string $attribute)
    {
        if (!$this->entity->$attribute instanceof Carbon) {
            return null;
        }

        return $this->entity->$attribute->format(CarbonFormats::DATE_TIME);
    }

    public function diffForHumans(string $attribute, array $args = [])
    {
        if (!$this->entity->$attribute instanceof Carbon) {
            return null;
        }

        $suffix = array_get($args, 'suffix', true);
        $short = array_get($args, 'short', false);
        $precision = array_get($args, 'precision', 1);

        return $this->entity->$attribute->diffForHumans(null, !$suffix, $short, $precision);
    }
}
