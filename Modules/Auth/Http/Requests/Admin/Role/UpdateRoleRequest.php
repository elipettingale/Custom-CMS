<?php

namespace Modules\Auth\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $role = $this->route('role');

        return [
            'name' => ['required', 'unique:roles,name,' . $role->id],
            'permissions' => ['required', 'array']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => trans('auth::attributes.role.name'),
            'permissions' => trans('auth::attributes.role.permissions'),
        ];
    }
}
