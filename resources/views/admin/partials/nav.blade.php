<style>
    /*ul {*/
    /*    list-style-type: none;*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*    width: 200px;*/
    /*    background-color: #f1f1f1;*/
    /*}*/

    /*li a {*/
    /*    display: block;*/
    /*    color: #000;*/
    /*    padding: 8px 16px;*/
    /*    text-decoration: none;*/
    /*}*/

    /*!* Change the link color on hover *!*/
    /*li a:hover {*/
    /*    background-color: #555;*/
    /*    color: white;*/
    /*}*/
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a, .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover, .dropdown:hover .dropbtn {
        background-color: teal;
    }

    li.dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {background-color: #f1f1f1;}

    .dropdown:hover .dropdown-content {
        display: block;
</style>
<nav>
{{--    <ul>--}}
{{--        <li><a href="{{route('admin.index')}}">Dashboard</a></li>--}}
{{--        <li><a href="{{route('building.index')}}">Building</a></li>--}}
{{--        <li><a href="{{route('admin.index')}}">Billing</a></li>--}}
{{--        <li><a href="{{route('admin.index')}}">User Management</a></li>--}}
{{--        <li>--}}
{{--            <form method="POST" action="{{ route('logout') }}">--}}
{{--                @csrf--}}
{{--                <a href="{{ route('logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                   this.closest('form').submit();">Logout</a>--}}
{{--            </form>--}}
{{--        </li>--}}
{{--    </ul>--}}

    <ul>
        <li><a href="{{route('admin.index')}}">Dashboard</a></li>

        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Buildings</a>
            <div class="dropdown-content">
                <a href="{{route('building.create')}}">Create New</a>
                <a href="{{route('building.lists')}}">Building Lists</a>
            </div>
        </li>

        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Billings</a>
            <div class="dropdown-content">
                <a href="#">Unit / Room Billing</a>
                <a href="#">Electricity Billing</a>
                <a href="#">Water Billing</a>
            </div>
        </li>

        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">User Management</a>
            <div class="dropdown-content">
                <a href="{{route('user.create')}}">Create New</a>
                <a href="{{route('user.lists')}}">User List</a>
                <a href="#">Roles</a>
            </div>
        </li>

        <li>


        <li><a href="{{route('admin.index')}}">Reports</a></li>
        <li><a href="{{route('admin.index')}}">System</a></li>
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
