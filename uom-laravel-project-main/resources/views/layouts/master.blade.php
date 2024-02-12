<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--title-->
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto:wght@300;400;500&display=swap"
        rel="stylesheet">

    <!--styles-->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }
        .wrap {
            min-height: 70vh;
            height: auto !important;
            height: 100%;
        }
    </style>
    <!--extra styles-->
    @yield('styles')
</head>

<body class="d-flex flex-column h-100">

    @include('layouts.header')

    @include('layouts.hero')

    <main class="wrap">
        @yield('content')
    </main>

    @include('layouts.footer')

    <!--scripts-->
    <script src="{{ asset('backend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>
