@extends('admin.layouts.app')

@section('content')
{{--    <a href="#">Create New Permission</a>--}}
    <table border="1">
        <thead>
        <tr>
            <th>Permission Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->name}}</td>
                <td>Edit</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
