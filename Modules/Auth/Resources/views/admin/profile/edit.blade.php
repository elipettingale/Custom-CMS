@extends('layouts.admin.main')
@section('title', 'My Profile')

@section('actions')
    <div class="action-buttons">
        <a href="{{ route('admin.profile.settings.edit') }}" class="btn btn-info">
            <i class="fa fa-cog"></i> My Settings
        </a>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-8">
            @component('components.admin.card')
                @slot('header')
                    <i class="fa fa-edit"></i> Content
                @endslot
                @slot('body')
                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include('auth::admin.profile.partials.content')
                        <div class="card-buttons">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Update
                            </button>
                            <a class="btn btn-danger" href="">
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
                    <form method="POST" action="{{ route('admin.profile.password.update') }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include('auth::admin.profile.partials.password')
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
