@extends('admin.layouts.app')

@section('content')
    <a href="{{route('user.roles.create')}}">Create New Role</a>
    <table border="1">
        <thead>
            <tr>
                <th>Role Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role}}</td>
                <td>Edit</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
