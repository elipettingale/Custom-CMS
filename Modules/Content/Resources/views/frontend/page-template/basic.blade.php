@extends('layouts.frontend.main')
@section('title', $seoProfile->title ?? $page->title)

@push('meta')
    <meta name="description" content="{{ $seoProfile->description ?? $page->present()->preview('content') }}"/>
@endpush

@section('content')

    <div class="page">
        <div class="page-body">
            {!! $page->present()->content('content') !!}
        </div>
    </div>

@endsection
