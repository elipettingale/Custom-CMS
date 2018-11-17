<?php

namespace Modules\Content\Http\Requests\Admin\Page;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        $page = $this->route('page');

        $rules = [
            'title' => ['required']
        ];

        if ($page->template->key === 'basic') {
            return array_merge($rules, $this->basicRules());
        }

        if ($page->template->key === 'col-2') {
            return array_merge($rules, $this->col2Rules());
        }

        return $rules;
    }

    public function attributes(): array
    {
        $page = $this->route('page');

        $attributes = [
            'title' => trans('content::attributes.page.title')
        ];

        if ($page->template->key === 'basic') {
            return array_merge($attributes, $this->basicAttributes());
        }

        if ($page->template->key === 'basic') {
            return array_merge($attributes, $this->col2Attributes());
        }

        return $attributes;
    }

    private function basicRules(): array
    {
        return [
            'data.content' => ['required']
        ];
    }

    private function basicAttributes(): array
    {
        return [
            'data.content' => trans('content::attributes.page-template.basic.content')
        ];
    }

    private function col2Rules(): array
    {
        return [
            'data.content_left' => ['required'],
            'data.content_right' => ['required']
        ];
    }

    private function col2Attributes(): array
    {
        return [
            'data.content_left' => trans('content::attributes.page-template.col-2.content_1'),
            'data.content_right' => trans('content::attributes.page-template.col-2.content_2')
        ];
    }
}
