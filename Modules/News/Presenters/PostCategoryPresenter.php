<?php

namespace Modules\News\Presenters;

use Laracasts\Presenter\Presenter;

class PostCategoryPresenter extends Presenter
{
    public function postsCount()
    {
        return $this->entity->posts_count . ' Post(s)';
    }
}
