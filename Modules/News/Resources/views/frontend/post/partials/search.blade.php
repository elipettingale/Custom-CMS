<div class="sidebar-item card">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <form method="GET" action="{{ route('frontend.posts.index') }}">
            <div class="input-group">
                <input type="text" name="search" title="search" value="{{ request('search') }}" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>