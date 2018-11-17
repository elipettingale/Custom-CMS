<div class="form-group">
    <label for="data-table-search" class="form-control-label">Search</label>
    <input type="text" id="data-table-search" data-table-ref="main" class="form-control">
</div>

@component('components.admin.table')
    @slot('options', ['pagination' => false])
    @slot('header')
        <tr>
            <th>@lang('auth::attributes.role.permission')</th>
            <th class="no-sort no-search"></th>
        </tr>
    @endslot
    @slot('body')
        @foreach($permissions->getPermissions() as $permission)
            <tr>
                <td>{{ $permission->getName() }}</td>
                <td class="text-right">
                    <div class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-success btn-sm {{ $role->hasAccess($permission->getKey()) ? 'active' : '' }}">
                            <input type="radio" name="permissions[{{ $permission->getKey() }}]" value="allow" {{ $role->hasAccess($permission->getKey()) ? 'checked' : '' }}>
                            <span>Allow</span>
                        </label>
                        <label class="btn btn-danger btn-sm {{ $role->hasAccess($permission->getKey()) ? '' : 'active' }}">
                            <input type="radio" name="permissions[{{ $permission->getKey() }}]" value="disallow" {{ $role->hasAccess($permission->getKey()) ? '' : 'checked' }}>
                            <span>Disallow</span>
                        </label>
                    </div>
                </td>
            </tr>
        @endforeach
    @endslot
@endcomponent
