<?php

namespace Modules\News\Presenters;

use Modules\Core\Traits\PresentsStatusBadge;
use Modules\Core\Traits\PresentsTimestamps;
use Laracasts\Presenter\Presenter;
use Modules\Content\Traits\PresentsWysiwygContent;

class PostPresenter extends Presenter
{
    use PresentsStatusBadge, PresentsTimestamps, PresentsWysiwygContent;

    public function category(): string
    {
        if (!$category = $this->entity->category) {
            return 'None';
        }

        return $category->name;
    }
}
