<div class="row posts latest-posts">
    @foreach($latestLivePosts->take($count ?? 6) as $post)
        <div class="col-12 col-sm-6 col-lg-4 d-flex">
            @include('news::frontend.post.partials.preview')
        </div>
    @endforeach
</div>
