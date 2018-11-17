<?php

namespace Modules\Content\Traits;

use Modules\Content\Services\Shortcodes;
use Modules\Core\Contracts\Shortcode;

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
            $start = '/\[' . $item->signature() . '\]';
            $end = '\[\/' . $item->signature() . '\]/';

            if (preg_match($start . '(.*)' . $end, $value, $matches)) {
                $value = str_replace(array_shift($matches), $item->render(strip_tags($matches[0])), $value);
            }
        }

        return $value;
    }
}
