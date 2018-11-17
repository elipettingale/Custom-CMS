@extends('layouts.admin.main')
@section('title', 'Create New Role')

@section('content')

    <form method="POST" action="{{ route('admin.roles.store') }}">
        {{ csrf_field() }}
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
                                <i class="fa fa-check"></i> Create
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
