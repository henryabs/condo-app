@extends('admin.layouts.app')

@section('content')
    Create Roles
    <br><br>
    <form action="{{route('user.roles.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Role name"><br><br>
        @foreach($permissions as $permission)

            <input type="checkbox" name="permission[]" value="{{$permission->id}}"> {{$permission->name}}

        @endforeach
        <br><br>
        <input type="submit" value="Create Role">
    </form>
@endsection
