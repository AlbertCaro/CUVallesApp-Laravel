<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <!-- Favicon -->
    <link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('css/app.css') }}?v=1.0.0" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/consts.js')}}"></script>
</head>

<body class="@yield('bg')">
@yield('child')
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>

