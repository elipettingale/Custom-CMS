@extends('layouts.frontend.main')
@section('title', 'Posts')

@section('content')

    <div class="col-12 col-lg-8">
        <h1 class="hr-b">{{ $category->name }}</h1>

        <div class="row posts">
            @forelse($posts as $post)
                <div class="col-12 col-lg-6 d-flex">
                    @include('news::frontend.post.partials.preview')
                </div>
            @empty
                <div class="col-12 col-lg-6 d-flex">
                    <h5>No Posts Found!</h5>
                </div>
            @endforelse
        </div>

        {{ $posts->appends(request()->except('page'))->links() }}
    </div>

    <div class="col-12 col-lg-4">
        <div class="sidebar">
            @include('news::frontend.post.partials.search')
            @include('news::frontend.post.partials.post-categories')
        </div>
    </div>

@endsection
