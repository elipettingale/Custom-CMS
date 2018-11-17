@extends('layouts.admin.main')
@section('title', 'Dashboard')

@push('styles')
    <link href="{{ asset('css/admin/dashboard.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="admin-charts">
        <div class="row">
            <div class="col-12 col-xl-7">
                @include('dashboard::admin.dashboard.partials.published-posts-by-month')
                @include('dashboard::admin.dashboard.partials.news-feed')
            </div>

            <div class="col-12 col-xl-5">
                @include('dashboard::admin.dashboard.partials.posts-by-category')
                @include('dashboard::admin.dashboard.partials.users-by-activity')
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endpush
