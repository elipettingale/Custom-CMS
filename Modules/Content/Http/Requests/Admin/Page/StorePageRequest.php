<?php

namespace Modules\Content\Http\Requests\Admin\Page;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'template' => ['required']
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => trans('content::attributes.page.title'),
            'template' => trans('content::attributes.page.template')
        ];
    }
}
