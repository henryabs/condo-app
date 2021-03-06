@extends('admin.layouts.app')

@section('content')
    <a href="{{route('user.roles.create')}}">Create New Role</a>
    <table border="1">
        <thead>
            <tr>
                <th>Role Name</th>
                <th>Permissions</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>
                    @foreach($permissions as $permission)
                        @if($role->hasPermissionTo($permission))
                            <span style="background: green;color: white;padding: 2px;border-radius: 5px">{{$permission->name}}</span>
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
