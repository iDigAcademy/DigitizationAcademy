<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="FSU Digitization Academy">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ vite_asset('resources/media/favicon.png') }}">

    <x-scripts/>
    @vite(['resources/js/app.js'])
</head>
<body class="sticky-header">
<a href="#main-wrapper" id="backto-top" class="back-to-top">
    <i class="far fa-angle-double-up"></i>
</a>
<!--=====================================-->
<!--=             preload               =-->
<!--=====================================-->
<div id="preloader"></div>

<div id="main-wrapper" class="main-wrapper">
    <!--=====================================-->
    <!--=             header               	=-->
    <!--=====================================-->
    <x-header-navbar/>

    <!--=====================================-->
    <!--=             Content             	=-->
    <!--=====================================-->
    {{ $slot }}

    <!--=====================================-->
    <!--=        Footer                  	=-->
    <!--=====================================-->
    <x-footer />

    <!--=====================================-->
    <!--=       Right slider mega menu      =-->
    <!--=====================================-->
    <x-aside-menu />
</div>
</body>
</html>
