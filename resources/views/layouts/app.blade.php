<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

       {{-- Dynamic Title and Meta Tags --}}
       <title>@yield('title', 'Muhammad Hamid | Software Engineer & Laravel Developer')</title>
       <meta name="description" content="@yield('meta_description', 'I am Muhammad Hamid, a professional Software Engineer specializing in Laravel, Fullstack Development, and modern web solutions.')">
       <meta name="keywords" content="@yield('meta_keywords', 'Muhammad Hamid, Software Engineer, Laravel Developer, Fullstack Developer, Web Developer')">
       <meta name="author" content="Muhammad Hamid">

       {{-- Open Graph Meta Tags (Social Sharing) --}}
       <meta property="og:title" content="@yield('og_title', 'Muhammad Hamid | Software Engineer')">
       <meta property="og:description" content="@yield('og_description', 'Explore my portfolio showcasing Laravel, Fullstack, and software engineering projects.')">
       <meta property="og:image" content="@yield('og_image', asset('assets/img/my-profile-img.jpg'))">
       <meta property="og:url" content="{{ url()->current() }}">
       <meta property="og:type" content="website">

       {{-- Twitter Card Meta --}}
       <meta name="twitter:card" content="summary_large_image">
       <meta name="twitter:title" content="@yield('twitter_title', 'Muhammad Hamid | Software Engineer')">
       <meta name="twitter:description" content="@yield('twitter_description', 'Discover my professional skills, portfolio, and blogs.')">
       <meta name="twitter:image" content="@yield('twitter_image', asset('assets/img/my-profile-img.jpg'))">



  {{-- Favicon --}}
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">




    @stack('styles') <!-- Additional Styles -->
</head>

<body class="@yield('body-class', 'index-page')">
    @include('pages.header') <!-- Shared Header -->

    <main class="main">
        @yield('content') <!-- Page-specific Content -->
    </main>

    @include('partials.footer') <!-- Shared Footer -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts') <!-- Additional Scripts -->
</body>

</html>
