@component('components.admin.card')
    @slot('header')
        News Feed
    @endslot
    @slot('body')
        <div class="news-feed">
            @foreach($latestLivePosts as $post)
                <div class="post">
                    <img class="featured-image" src="{{ $post->featured_image->getUrl('thumb', true) }}">
                    <div class="content">
                        <div class="post-header">
                            <a href="{{ route('frontend.posts.show', $post->slug) }}"><h5>{{ $post->title }}</h5></a>
                            <span>{{ $post->present()->diffForHumans('published_at') }}</span>
                        </div>
                        <div class="post-body">
                            {{ $post->present()->preview('content') }}
                        </div>
                    </div>
                </div>

                <hr>
            @endforeach
            <div class="btn-bar">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-info">Manage Posts</a>
            </div>
        </div>
    @endslot
@endcomponent
