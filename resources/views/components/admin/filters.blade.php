<form method="GET" data-auto-filter="true">
    <div class="form-group">
        <label for="data-table-search" class="form-control-label">Search</label>
        <input type="text" id="data-table-search" name="search" data-table-ref="main" class="form-control" value="{{ request('search') }}">
    </div>

    {{ $slot }}

    <div class="card-buttons">
        <a href="{{ url()->current() }}" class="btn btn-warning">
            <i class="fa fa-ban"></i> Clear
        </a>
    </div>
</form>