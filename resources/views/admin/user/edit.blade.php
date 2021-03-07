@extends('admin.layouts.app')

@section('content')
    Edit User


    <form action="{{route('user.update')}}#" method="POST">
        @csrf
        <input type="hidden" name="userID" value="{{$user->id}}">
        <input type="text" name="name" placeholder="Full Name" value="{{$user->name}}"><br><br>
        <input type="text" name="email" placeholder="Email" value="{{$user->email}}"><br><br>
        <select name="role">
            @foreach($roles as $role)
                <option value="{{$role->id}}" {{$user->getRoleNames()[0] == $role->name ? 'selected': ''}} >{{$role->name}}</option>
            @endforeach
        </select><br><br>
        <label for="">Special Permissions</label>
        <br><br>
        @foreach($permissions as $permission)
            <input type="checkbox" name="permission[]" value="{{$permission->id}}" {{$user->hasDirectPermission($permission->id) ? 'checked' : ''}}>{{$permission->name}}
        @endforeach
        <br><br>
        <input type="submit" value="Update Now">
    </form>
@endsection
