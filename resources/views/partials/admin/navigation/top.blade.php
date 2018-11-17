<ul class="navbar-nav navbar-topnav ml-auto">
    <li class="nav-item">
        <a class="nav-link {{ (url()->current() === route('admin.profile.edit') || url()->current() === route('admin.profile.settings.edit')) ? 'active' : '' }}" href="{{ route('admin.profile.edit') }}">
            <i class="fa fa-fw fa-user"></i> {{ current_user()->present()->fullName }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.logout.handle') }}" class="nav-link" data-alert="confirm">
            <i class="fa fa-fw fa-sign-out-alt"></i> Logout
        </a>
    </li>
</ul>