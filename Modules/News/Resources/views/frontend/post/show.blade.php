@extends('layouts.frontend.main')
@section('title', $seoProfile->title ?? $post->title)

@push('meta')
    <meta name="description" content="{{ $seoProfile->description ?? $post->present()->content(true) }}"/>
@endpush

@section('content')

    <div class="post">
        <img class="featured-image" src="{{ $post->featured_image->getUrl('thumb', true) }}">
        <div class="post-header">
            <h2>{{ $post->title }}</h2>
            <span>{{ $post->present()->diffForHumans('published_at') }}</span>
        </div>
        <div class="post-body">
            {!! $post->present()->content('content') !!}
        </div>
    </div>

@endsection
