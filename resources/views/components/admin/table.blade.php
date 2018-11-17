<div class="table-responsive">
    <table
            class="table table-bordered table-striped"
            width="100%" cellspacing="0"
            data-table-ref="{{ $options['ref'] ?? 'main' }}"
            data-table-sort-column="{{ $options['sort_column'] ?? 0 }}"
            data-table-sort-direction="{{ $options['sort_direction'] ?? 'asc' }}"
            data-table-per-page="{{ $options['per_page'] ?? 10 }}"
            data-table-pagination="{{ $options['pagination'] ?? 'true' }}"
    >
        <thead>
        {{ $header }}
        </thead>
        <tbody>
        {{ $body }}
        </tbody>
    </table>
</div>