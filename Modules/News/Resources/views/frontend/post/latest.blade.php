<div class="row">
    @foreach($latestLivePosts as $post)
        <div class="col-4">
            @include('news::frontend.post.partials.preview')
        </div>
    @endforeach
</div>
