<div class="sidebar-item card">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <ul class="list-unstyled mb-0">
            @foreach($postCategories as $postCategory)
                <li>
                    <a href="{{ route('frontend.posts.categories.show', ['slug' => $postCategory->slug]) }}">{{ $postCategory->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>