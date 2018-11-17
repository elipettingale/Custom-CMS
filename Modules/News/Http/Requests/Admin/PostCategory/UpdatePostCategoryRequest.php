<?php

namespace Modules\News\Http\Requests\Admin\PostCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $postCategory = $this->route('post-category');

        return [
            'name' => ['required']
        ];
    }
}
