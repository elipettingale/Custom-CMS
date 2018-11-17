<?php

namespace Modules\Auth\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $user = current_user();

        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
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
