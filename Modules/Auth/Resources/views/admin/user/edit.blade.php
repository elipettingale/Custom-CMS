@extends('layouts.admin.main')
@section('title', "Edit User: {$user->present()->fullName}")

@section('content')

    <div class="row">
        <div class="col-xl-8">
            @component('components.admin.card')
                @slot('header')
                    <i class="fa fa-edit"></i> Content
                @endslot
                @slot('body')
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include('auth::admin.user.partials.form.edit.content')
                        <div class="card-buttons">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Update
                            </button>
                            <a class="btn btn-danger" href="{{ route('admin.users.index') }}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
        <div class="col-xl-4">
            @component('components.admin.card')
                @slot('header')
                    <i class="fa fa-edit"></i> Password
                @endslot
                @slot('body')
                    <form method="POST" action="{{ route('admin.users.update.password', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include('auth::admin.user.partials.form.edit.password')
                        <div class="card-buttons">
                            <button type="submit" class="btn btn-info">
                                Reset Password
                            </button>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
