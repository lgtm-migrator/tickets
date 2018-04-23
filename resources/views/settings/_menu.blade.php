<nav>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link{{ active('settings') }}" href="{{ route('settings') }}">{{ tra('settings.menu.profile') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('settings.password') }}" href="{{ route('settings.password') }}">{{ tra('settings.menu.password') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('settings.language') }}" href="{{ route('settings.language') }}">{{ tra('settings.menu.language') }}</a>
        </li>
    </ul>
</nav>
