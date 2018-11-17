<?php

namespace Modules\Auth\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $user = $this->route('user');

        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'roles' => ['exists:roles,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => trans('auth::attributes.user.first_name'),
            'last_name' => trans('auth::attributes.user.last_name'),
            'email' => trans('auth::attributes.user.email'),
        ];
    }
}
