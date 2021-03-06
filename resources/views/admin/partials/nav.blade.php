<nav>
    <ul>
        <li><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li><a href="{{route('admin.index')}}">Building</a></li>
        <li><a href="{{route('admin.index')}}">Billing</a></li>
        <li><a href="{{route('admin.index')}}">User Management</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   this.closest('form').submit();">Logout</a>
            </form>
        </li>
    </ul>
</nav>
