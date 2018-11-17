<?php

namespace Modules\Content\Traits;

use Modules\Content\Services\Shortcodes;
use Modules\Content\ValueObjects\Shortcode;

trait PresentsWysiwygContent
{
    public function content(string $key)
    {
        return $this->wysiwyg($key);
    }

    public function preview(string $key, int $limit = 200)
    {
        return str_limit(strip_tags($this->wysiwyg($key)), $limit);
    }

    private function wysiwyg(string $attribute)
    {
        $value = $this->entity->$attribute;

        /** @var Shortcodes $shortcodes */
        $shortcodes = app('wysiwyg-shortcodes');

        /** @var Shortcode $item */
        foreach ($shortcodes->getItems() as $item) {
            if (strpos($value, $item->getKey())) {
                $value = str_replace($item->getKey(), $item->getValue(), $value);
            }
        }

        return $value;
    }
}
