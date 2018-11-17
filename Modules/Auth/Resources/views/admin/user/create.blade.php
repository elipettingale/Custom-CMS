@extends('layouts.admin.main')
@section('title', 'Create New User')

@section('content')

    <form method="POST" action="{{ route('admin.users.store') }}">
        {{ csrf_field() }}
        @component('components.admin.card')
            @slot('header')
                <i class="fa fa-edit"></i> Content
            @endslot
            @slot('body')
                @include('auth::admin.user.partials.form.create.content')
                <div class="card-buttons">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Create
                    </button>
                    <a class="btn btn-danger" href="{{ route('admin.users.index') }}">
                        <i class="fa fa-ban"></i> Cancel
                    </a>
                </div>
            @endslot
        @endcomponent
    </form>

@endsection
