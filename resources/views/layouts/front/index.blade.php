<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }}</title>
  <meta content="psikotes online terbaik diindonesia" name="description">
  <meta content="psikotest,tes masuk prolri, tes masuk tni, psikotes online" name="keywords">

  <!-- Favicons -->
  <link href=" {{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href=" {{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SoftLand - v4.9.1
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="">
        {{-- <h1><a href="{{ route('home') }}">{{ config('app.name') }}</a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="img/logo.png" alt="" class="img img-fluid" width="150px"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('page.fitur') }}">Fitur</a></li>
          <li><a href="{{ route('page.harga') }}">Harga</a></li>  
          @guest

          <li><a href="{{route('login')}}">Login</a></li>
          <li><a href="{{route('register')}}">Register</a></li>

          @else

          <li class="dropdown"><a href="#"><span>Psikotes</span> <i class="bi bi-chevron-down"></i></a>
            <ul>                      
              <li><a href="{{route('member.soal.type' , 'cerdas')}}">Soal Kecerdasan</a></li>
              <li><a href="{{route('member.soal.type' , 'cermat')}}">@lang('app.Soal-Kecermatan')</a></li>    
              <li><a href="{{route('member.soal.type' , 'kepribadian')}}">@lang('app.soal-kepribadian')</a></li>          
            </ul>
          </li>

          <li><a href="{{ route('dashboard') }}">Dashboard</a></li>  

          <li class="nav-item">
                      
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf

            <button class="nav-link btn btn-default btn-sm text-white">             
              <span>{{ __('Logout') }}</span>
            </button>

         </form>

          </li>  


        @endguest

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      {!! seo() !!}

    </div>
  </header><!-- End Header -->

  @yield('header')

  <main id="main">

  @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <x-footer></x-footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>