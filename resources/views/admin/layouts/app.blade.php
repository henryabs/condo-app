<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{env('APP_NAME')}}</title>
    {{--TOASTER--}}
    <link rel="stylesheet" href="{{asset('asset/css/toastr.min.css')}}">
</head>

<body>

<header>
    @include('admin.partials.nav')
</header>

<div class="container">
    @yield('content')
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('asset/js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type')}}";
    switch(type){
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif

    @if($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{$error}}");
    @endforeach
    @endif
</script>
</html>
