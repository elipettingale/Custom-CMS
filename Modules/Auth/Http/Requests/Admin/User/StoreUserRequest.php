<?php

namespace Modules\Auth\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5', 'confirmed'],
            'roles' => ['exists:roles,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => trans('auth::attributes.user.first_name'),
            'last_name' => trans('auth::attributes.user.last_name'),
            'email' => trans('auth::attributes.user.email'),
            'password' => trans('auth::attributes.user.password'),
            'password_confirmation' => trans('auth::attributes.user.password_confirmation'),
        ];
    }
}
