<div class="dropdown {{ strlen($slot) === 0 ? 'd-none' : '' }}">
    <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
        Actions
    </button>
    <div class="dropdown-menu">{{ $slot }}</div>
</div>
