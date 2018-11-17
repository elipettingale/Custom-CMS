<?php

namespace Modules\News\Validators\Post;

use Modules\Core\Services\EntityValidator;
use Modules\Media\Rules\ValidMedia;
use Modules\Seo\Rules\ValidSeoProfile;

class MarkAsLivePostValidator extends EntityValidator
{
    public function rules(): array
    {
        return [
            'content' => ['required'],
            'featured_image' => ['required', new ValidMedia()],
            'category_id' => ['required', 'exists:post_categories,id'],
            'seo_profile' => ['required', new ValidSeoProfile()]
        ];
    }

    public function attributes(): array
    {
        return [
            'content' => trans('news::attributes.post.content'),
            'featured_image' => trans('news::attributes.post.featured_image'),
            'category_id' => trans('news::attributes.post.category_id'),
            'seo_profile' => trans('seo::entities.seo-profile')
        ];
    }
}
