<div class="admin-header container-fluid">
    <h2>@yield('title')</h2>
    <div class="action-btn-group">
        @if(user_is_being_impersonated())
            <div>
                <form method="POST" action="{{ route('admin.session.restore') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info">
                        Restore Session
                    </button>
                </form>
            </div>
        @endif
        <div class="action-buttons">
            @yield('actions')
        </div>
    </div>
</div>
@if(!empty($breadcrumbs))
    <ol class="breadcrumb">
        @foreach($breadcrumbs as $breadcrumb)
            {!! $breadcrumb !!}
        @endforeach
    </ol>
@endif