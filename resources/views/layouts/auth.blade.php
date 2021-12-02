<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="CRM">
    <meta name="author" content="Firdovsi Rustamov">
    <link rel="shortcut icon" href="{{asset('wafi/img/fav.png')}}"/>

    <!-- Title -->
    <title>{{ config('app.name', 'Blue Planet Distribution') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('wafi/css/bootstrap.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('wafi/css/main.css')}}">
</head>

<body class="authentication">

<!-- Container start -->
<div class="container">
    @yield('content')
</div>

</body>
</html>
