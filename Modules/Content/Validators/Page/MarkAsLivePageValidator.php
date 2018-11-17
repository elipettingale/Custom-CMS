<?php

namespace Modules\Content\Validators\Page;

use Modules\Core\Services\EntityValidator;
use Modules\Seo\Rules\ValidSeoProfile;

class MarkAsLivePageValidator extends EntityValidator
{
    protected function rules(): array
    {
        if ($this->entity->template->key === 'basic') {
            $rules = $this->basicRules();
        }

        if ($this->entity->template->key === 'col-2') {
            $rules = $this->col2Rules();
        }

        return array_merge($rules, [
            'seo_profile' => ['required', new ValidSeoProfile()]
        ]);
    }

    protected function attributes(): array
    {
        if ($this->entity->template->key === 'basic') {
            $attributes = $this->basicAttributes();
        }

        if ($this->entity->template->key === 'col-2') {
            $attributes = $this->col2Attributes();
        }

        return array_merge($attributes, [
            'seo_profile' => trans('seo::entities.seo-profile')
        ]);
    }

    private function basicRules(): array
    {
        return [
            'content' => ['required'],
        ];
    }

    private function basicAttributes(): array
    {
        return [
            'content' => trans('content::attributes.page-template.basic.content')
        ];
    }

    private function col2Rules(): array
    {
        return [
            'content_left' => ['required'],
            'content_right' => ['required'],
        ];
    }

    private function col2Attributes(): array
    {
        return [
            'content_left' => trans('content::attributes.page-template.col-2.content_left'),
            'content_right' => trans('content::attributes.page-template.col-2.content_right')
        ];
    }
}
