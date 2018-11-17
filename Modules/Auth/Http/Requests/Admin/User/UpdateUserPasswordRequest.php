<?php

namespace Modules\Auth\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => ['required', 'min:5', 'confirmed'],
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => trans('auth::attributes.user.password'),
            'password_confirmation' => trans('auth::attributes.user.password_confirmation'),
        ];
    }
}
