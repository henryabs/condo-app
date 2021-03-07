@extends('admin.layouts.app')

@section('content')
    Create Users


    <form action="{{route('user.store')}}#" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Full Name" value="{{old('name')}}"><br><br>
        <input type="text" name="email" placeholder="Email" value="{{old('email')}}"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" value="Create Now">
    </form>
@endsection
