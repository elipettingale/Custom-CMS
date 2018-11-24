<div class="post-preview card">
    <a href="{{ route('frontend.posts.show', $post->slug) }}">
         <img class="featured-image" src="{{ $post->featured_image->getUrl('thumb', true) }}">
    </a>
    <div class="card-body">
        <div class="card-text">
            <a href="{{ route('frontend.posts.show', $post->slug) }}">
                <h5>{{ $post->title }}</h5>
            </a>
            <div class="post-details hr-b">
                Posted: {{ $post->present()->diffForHumans('published_at') }}
            </div>
            <div class="post-content">
                {{ $post->present()->preview('content') }}
            </div>
        </div>
        <a href="{{ route('frontend.posts.show', $post->slug) }}" class="btn btn-info">Read More</a>
    </div>
</div>