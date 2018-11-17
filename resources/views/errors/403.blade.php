@extends('layouts.frontend.blank')
@section('title', '403')

@section('content')

    <div class="container">
        <div class="error">
            <div class="error-header">
                <h2>403</h2>
                <span>You are not authorized to view this page</span>
            </div>
            <div class="error-body">
                <p>Sorry but you do not have permission to view this page.</p>
                @if(user_is_being_impersonated())
                    <p>It looks like you are currently impersonating another user. If you would like to restore your session click below</p>
                    <form method="POST" action="{{ route('admin.session.restore') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-info">
                            Restore Session
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection
