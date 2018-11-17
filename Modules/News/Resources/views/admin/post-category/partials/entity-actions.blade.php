<div class="dropdown">
    <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
        <i class="fa fa-cog"></i>
    </button>
    <div class="dropdown-menu">
        @can('edit', $postCategory)
            <a href="{{ route('admin.post-categories.edit', $postCategory->id) }}" class="dropdown-item dropdown-info">
                <i class="fa fa-edit"></i> Edit
            </a>
        @endcan
        @can('delete', $postCategory)
            <form method="POST" action="{{ route('admin.post-categories.destroy', $postCategory->id) }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" class="dropdown-item dropdown-danger" data-alert="confirm-delete">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </form>
        @endcan
    </div>
</div>
