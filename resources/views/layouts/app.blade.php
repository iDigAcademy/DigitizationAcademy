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

    <link rel="shortcut icon" type="image/x-icon" href="{{ mix('images/favicon.png') }}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @include('components.scripts')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XBKJG01XTP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-XBKJG01XTP');
    </script>
    @bukStyles
</head>
<body class="sticky-header">
<a href="#main-wrapper" id="backto-top" class="back-to-top">
    <i class="far fa-angle-double-up"></i>
</a>
@include('partials.notices')
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
    @auth
    <x-aside-menu />
    @endauth
</div>
@include('sweetalert::alert')
@stack('scripts')
@bukScripts
</body>
</html>
