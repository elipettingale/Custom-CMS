@extends('layouts.frontend.main')
@section('title', 'Posts')

@section('content')

    <div class="row posts">
        @foreach($posts as $post)
            <div class="col-12 col-lg-6 col-xl-4 d-flex">
                @include('news::frontend.post.partials.preview')
            </div>
        @endforeach
    </div>

    {{ $posts->appends(request()->except('page'))->links() }}

@endsection
