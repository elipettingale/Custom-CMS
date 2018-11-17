@extends('layouts.admin.main')
@section('title', 'Users')

@section('actions')
    @component('components.admin.dropdown')
        @can('create', \Modules\Auth\Entities\User::class)
            <a class="dropdown-item dropdown-success" href="{{ route('admin.users.create') }}">
                <i class="fa fa-plus"></i> Create New User
            </a>
        @endcan
    @endcomponent
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-9 mb-3">
            @component('components.admin.table')
                @slot('header')
                    <tr>
                        <th>@lang('auth::attributes.user.first_name')</th>
                        <th>@lang('auth::attributes.user.last_name')</th>
                        <th>@lang('auth::attributes.user.email')</th>
                        <th class="no-sort no-search"></th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-right">
                                @component('components.admin.cog-dropdown')
                                    @can('impersonate', $user)
                                        <form method="POST" action="{{ route('admin.session.impersonate', $user->id) }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="dropdown-item dropdown-warning" data-alert="confirm" data-alert-message="Restore your session via the 'Restore Session' button!">
                                                <i class="fa fa-unlock"></i> Impersonate
                                            </button>
                                        </form>
                                    @endcan
                                    @can('edit', $user)
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="dropdown-item dropdown-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    @endcan
                                    @can('delete', $user)
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="dropdown-item dropdown-danger" data-alert="confirm-delete">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    @endcan
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
        <div class="col-xl-3">
            @component('components.admin.card')
                @slot('header')
                    Filters
                @endslot
                @slot('body')
                    @component('components.admin.filters')
                        <div class="form-group">
                            <label for="role_id" class="form-control-label">Has @lang('auth::attributes.user.role')</label>
                            <select name="role_id" id="role_id" class="form-control selectpicker" data-live-search="true">
                                <option></option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ (int) request('role_id') === $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="is_active" class="form-control-label">@lang('auth::attributes.user.activity')</label>
                            <select name="is_active" id="is_active" class="form-control selectpicker" data-live-search="true">
                                <option></option>
                                <option value="true" {{ request('is_active') === 'true' ? 'selected' : '' }}>Active</option>
                                <option value="false" {{ request('is_active') === 'false' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    @endcomponent
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
