<div class="post card">
    <img class="featured-image" src="{{ $post->featured_image->getUrl('thumb', true) }}">
    <div class="card-body">
        <div class="card-text">
            <a href="{{ route('frontend.posts.show', $post->slug) }}"><h5>{{ $post->title }}</h5></a>
            {{ $post->present()->preview('content') }}
        </div>
        <a href="{{ route('frontend.posts.show', $post->slug) }}" class="btn btn-info">Read More</a>
    </div>
</div>