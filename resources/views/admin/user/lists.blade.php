@extends('admin.layouts.app')

@section('content')
    <a href="{{route('user.create')}}">Create New User</a>
    <table border="1">
        <thead>
        <tr>
            <th>User Name</th>
            <th>Role</th>
            <th>Special Permission(s)</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        @foreach($roles as $role)
                            @if($user->hasRole($role))
                                {{$role->name}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($permissions as $permission)
                            @if($user->hasDirectPermission($permission))
                                <span style="background: green;color: white;padding: 2px;border-radius: 5px">{{$permission->name}}</span>

                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('user.edit', ['id' => $user->id])}}">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
