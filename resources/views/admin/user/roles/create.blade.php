@extends('admin.layouts.app')

@section('content')
    Create Roles
    <br><br>
    <form action="{{route('user.roles.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Role name"><br><br>
        <input type="submit" value="Create Role">
    </form>
@endsection
