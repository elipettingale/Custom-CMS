@extends('layouts.admin.blank')

@section('content')

    <div class="admin-login">
        <div class="login-header">
            <div class="logos">
                <a class="brand" target="_blank" href="/">
                    <svg class="logo" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 640 400">
                        @include('partials.admin.logo')
                    </svg>
                </a>
                <img class="client-logo" src="{{ '' }}"/>
            </div>
        </div>
        <div class="login-body container">
            @include('partials.admin.alerts')
            <div class="login-form">
                <form method="POST" action="{{ route('admin.login.handle') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" class="form-control" id="email" type="email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" class="form-control" id="password" type="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

@endsection
