<?php

namespace Modules\News\Policies;

use Modules\Core\Services\Policy;

class PostCategoryPolicy extends Policy
{
    protected $prefix = 'news.post-category';
}
