<div class="dropdown">
    <button class="btn btn-info dropdown-toggle" type="button" id="actionsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="actionsDropdown">
        @can('create', \Modules\News\Entities\PostCategory::class)
            <a class="dropdown-item dropdown-success" href="{{ route('admin.post-categories.create') }}">
                <i class="fa fa-plus"></i> Create New Category
            </a>
        @endcan
    </div>
</div>
