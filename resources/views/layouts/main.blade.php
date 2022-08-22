<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://bookstories.000webhostapp.com/blog/img/favicon.png" rel="icon">
  <link href="https://bookstories.000webhostapp.com/blog/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://bookstories.000webhostapp.com/blog/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('assets/blog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/blog/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/blog/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="https://bookstories.000webhostapp.com/blog/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="https://bookstories.000webhostapp.com/blog/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Rapid - v4.8.2
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('partials.navbar')

  @include('partials.hero')

  @yield('content')

  @include('partials.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://bookstories.000webhostapp.com/blog/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('assets/blog/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/blog/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/blog/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/blog/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/blog/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/blog/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="https://bookstories.000webhostapp.com/blog/js/main.js"></script>

</body>

</html>
