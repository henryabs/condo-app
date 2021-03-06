<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{env('APP_NAME')}}</title>
</head>

<body>

<header>
    @include('admin.partials.nav')
</header>

<div class="container">
    @yield('content')
</div>

</body>

</html>
