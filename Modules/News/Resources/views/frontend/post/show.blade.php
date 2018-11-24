@extends('layouts.frontend.main')
@section('title', $seoProfile->title ?? $post->title)

@push('meta')
    <meta name="description" content="{{ $seoProfile->description ?? $post->present()->content(true) }}"/>
@endpush

@section('content')

    <div class="col-12 col-lg-8">
        <div class="post">
            <h1 class="post-title">{{ $post->title }}</h1>
            <div class="post-details">
                <span>Posted: {{ $post->present()->date('published_at') }}</span>
            </div>
            <img class="featured-image" src="{{ $post->featured_image->getUrl('wide', true) }}">
            <div class="post-content">
                {!! $post->present()->content('content') !!}
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="sidebar">
            @include('news::frontend.post.partials.search')
            @include('news::frontend.post.partials.post-categories')
        </div>
    </div>

@endsection
