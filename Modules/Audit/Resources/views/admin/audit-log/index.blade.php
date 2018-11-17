@extends('layouts.admin.main')
@section('title', 'Audit Logs')

@section('content')

    <div class="row">
        <div class="col-xl-9 mb-3">
            @component('components.admin.table')
                @slot('options', ['sort_direction' => 'desc'])
                @slot('header')
                    <tr>
                        <th>@lang('audit::attributes.audit-log.created_at')</th>
                        <th class="no-sort">@lang('audit::attributes.audit-log.message')</th>
                        <th class="no-sort no-search">Actions</th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach($auditLogs as $auditLog)
                        <tr>
                            <td>{{ $auditLog->created_at }}</td>
                            <td>{!! $auditLog->present()->message(true) !!}</td>
                            <td>
                                <div class="action-btn-group">
                                    @can('show', $auditLog)
                                        <a href="{{ route('admin.audit-logs.show', $auditLog->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    @endcan
                                </div>
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
                            <label for="auditable_type" class="form-control-label">@lang('audit::attributes.audit-log.auditable_type')</label>
                            <select name="auditable_type" id="auditable_type" class="form-control selectpicker" data-live-search="true">
                                <option></option>
                                @foreach($auditableTypes as $auditableType)
                                    <option value="{{ $auditableType->key }}" {{ request('auditable_type') === $auditableType->key ? 'selected' : '' }}>{{ $auditableType->value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="user_id" class="form-control-label">@lang('audit::attributes.audit-log.user_id')</label>
                            <select name="user_id" id="user_id" class="form-control selectpicker" data-live-search="true">
                                <option></option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ (int) request('user_id') === $user->id ? 'selected' : '' }}>{{ $user->present()->fullName }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcomponent
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
