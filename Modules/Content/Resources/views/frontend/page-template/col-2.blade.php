@extends('layouts.frontend.main')
@section('title', $seoProfile->title ?? $page->title)

@push('meta')
    <meta name="description" content="{{ $seoProfile->description ?? $page->present()->preview('content') }}"/>
@endpush

@section('content')

    <div class="page">
        <div class="page-header">
            <h2>{{ $page->title }}</h2>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-12 col-xl-6">
                    {!! $page->present()->content('content_left') !!}
                </div>
                <div class="col-12 col-xl-6">
                    {!! $page->present()->content('content_right') !!}
                </div>
            </div>
        </div>
    </div>

@endsection
