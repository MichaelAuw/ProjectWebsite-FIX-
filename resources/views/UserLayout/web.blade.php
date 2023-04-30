<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio UTS - Michael Awarsa 2501965374</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: DevFolio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  @php
    $nav = "fixed-top header-scroll"
  @endphp
  
  @if(Request::is('user/home'))
    @php
      $nav = "fixed-top"
    @endphp
  @endif
    <header id="header" class="{{ $nav }}">
        <div class="container d-flex align-items-center justify-content-between">
          <h1 class="logo"><a href="index.html">Portfolio</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto {{ Request::path() === 'user/home' ? 'active' : '' }}" href="{{ url('user/home') }}">Home</a></li>
              <li><a class="nav-link scrollto {{ Request::path() === 'user/about' ? 'active' : '' }}" href="{{ url('user/about') }}">About</a></li>
              <li><a class="nav-link scrollto {{ Request::path() === 'user/education' ? 'active' : '' }}" href="{{ url('user/education') }}">Education</a></li>
              <li><a class="nav-link scrollto {{ Request::path() === 'user/interests' ? 'active' : '' }} " href="{{ url('user/interests') }}">Interests</a></li>
              <li><a class="nav-link scrollto {{ Request::path() === 'user/contact' ? 'active' : '' }}" href="{{ url('user/contact') }}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </header><!-- End Header -->
      
      <main>
        @yield('content')
      </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>