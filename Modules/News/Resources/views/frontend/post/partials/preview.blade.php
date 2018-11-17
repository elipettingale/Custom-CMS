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
        <a href="{{ route('frontend.posts.show', $post->slug) }}" class="btn btn-info">Read More</a>
    </div>
</div>