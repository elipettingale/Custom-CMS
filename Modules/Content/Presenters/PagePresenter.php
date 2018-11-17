<?php

namespace Modules\Content\Presenters;

use Modules\Core\Traits\PresentsStatusBadge;
use Laracasts\Presenter\Presenter;
use Modules\Content\Traits\PresentsWysiwygContent;

class PagePresenter extends Presenter
{
    use PresentsWysiwygContent, PresentsStatusBadge;

    //
}
