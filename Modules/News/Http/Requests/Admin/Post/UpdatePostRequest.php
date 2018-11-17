<?php

namespace Modules\News\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $post = $this->route('post');

        return [
            'title' => ['required'],
            'category_id' => ['nullable', 'exists:post_categories,id'],
            'content' => ['required']
        ];
    }
}
