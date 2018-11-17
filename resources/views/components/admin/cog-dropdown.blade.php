<div class="dropdown {{ strlen($slot) === 0 ? 'd-none' : '' }}">
    <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
        <i class="fa fa-cog"></i>
    </button>
    <div class="dropdown-menu">{{ $slot }}</div>
</div>
