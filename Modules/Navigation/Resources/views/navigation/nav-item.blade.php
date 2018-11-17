<li class="nav-item {{ $isActive ? 'active' : '' }}">
    <a class="nav-link" href="{{ $link }}">
        @if(isset($icon))
            <i class="fa fa-fw {{ $icon }}"></i>
        @endif
        <span class="nav-link-text">{{ $title }}</span>
    </a>
</li>