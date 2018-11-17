@extends('layouts.admin.main')
@section('title', "Edit Role: {$role->name}")

@section('actions')
    @if(request('advanced') === 'true')
        <a class="btn btn-warning" href="{{ route('admin.roles.edit', $role->id) }}">
            <i class="fa fa-cog"></i> Basic Mode
        </a>
    @else
        <a class="btn btn-warning" href="{{ route('admin.roles.edit', ['id' => $role->id, 'advanced' => 'true']) }}">
            <i class="fa fa-cog"></i> Advanced Mode
        </a>
    @endif
@endsection

@section('content')

    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="row">
            <div class="col-xl-5">
                @component('components.admin.card')
                    @slot('header')
                        <i class="fa fa-edit"></i> Content
                    @endslot
                    @slot('body')
                            @include('auth::admin.role.partials.content')
                        <div class="card-buttons">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Update
                            </button>
                            <a class="btn btn-danger" href="{{ route('admin.roles.index') }}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    @endslot
                @endcomponent
            </div>
            <div class="col-xl-7">
                @include('auth::admin.role.partials.permissions')
            </div>
        </div>
    </form>

@endsection
