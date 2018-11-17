<?php

namespace Modules\News\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'category_id' => ['nullable', 'exists:post_categories,id'],
            'content' => ['required']
        ];
    }
}
