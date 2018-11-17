@extends('layouts.admin.main')
@section('title', 'Roles')

@section('actions')
    @component('components.admin.dropdown')
        @can('create', \Modules\Auth\Entities\Role::class)
            <a class="dropdown-item dropdown-success" href="{{ route('admin.roles.create') }}">
                <i class="fa fa-plus"></i> Create New Role
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
                        <th>@lang('auth::attributes.role.name')</th>
                        <th class="no-sort no-search">Actions</th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td class="text-right">
                                @component('components.admin.cog-dropdown')
                                    @can('edit', $role)
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="dropdown-item dropdown-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    @endcan
                                    @can('delete', $role)
                                        <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
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
                    @endcomponent
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
