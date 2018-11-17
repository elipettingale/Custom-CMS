<li class="nav-item">
    <a class="nav-link nav-link-collapse {{ $isActive ? '' : 'collapsed' }}" data-toggle="collapse" href="#collapse{{ $title }}" data-parent="#side-navigation">
        @if(isset($icon))
            <i class="fa fa-fw {{ $icon }}"></i>
        @endif
        <span class="nav-link-text">{{ $title }}</span>
    </a>
    <ul class="sidenav-second-level collapse {{ $isActive ? 'show' : '' }}" id="collapse{{ $title }}">
        @foreach($children as $navItem)
            {!! $navItem !!}
        @endforeach
    </ul>
</li>