@extends('layouts.front.index')

@section('header')

<section class="hero-section" id="hero">

<!-- ======= Hero Section ======= -->

<div class="wave">

  <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
        <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
      </g>
    </g>
  </svg>

</div>

<div class="container">
  <div class="row align-items-center">
    <div class="col-12 hero-text-image">
      <div class="row">
        <div class="col-lg-8 text-center text-lg-start">
          <h1 data-aos="fade-right">Belajar Mudah - Akses Dimanapun</h1>
          <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Persiapkan dirimu untuk mengikuti tes seleksi Polri - TNI.</p>
          <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="{{ route('register') }}" class="btn btn-warning">Mulai Sekarang</a></p>
        </div>
        <div class="col-lg-4 iphone-wrap">
          {{-- <img src="assets/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right"> --}}
          <img src="img/exam.webp" alt="Image" class="img-fluid rounded shadow" data-aos="fade-right" data-aos-delay="200">
        </div>
      </div>
    </div>
  </div>
</div>

</section> <!-- End Hero -->



@endsection

@section('content')


<!-- ======= Home Section ======= -->
<section class="section">
  <div class="container">

    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-5" data-aos="fade-up">
        <h2 class="section-heading">Psikotes</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
          <div class="wrap-icon icon-1">
            <i class="bi bi-thermometer-sun"></i>
            
          </div>
          <h3 class="mb-3">Kecerdasan</h3>
          <p>Seberapa cerdasarkah kamu?</p>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center">
          <div class="wrap-icon icon-1">
            
            <i class="bi bi-clipboard2-check-fill"></i>
          </div>
          <h3 class="mb-3">Sikap Kerja</h3>
          <p>Ujian Sikap Kerja</p>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center">
          <div class="wrap-icon icon-1">
            <i class="bi bi-person-badge"></i>
          </div>
          <h3 class="mb-3">Kepribadian</h3>
          <p>Uji Kepribadian</p>
        </div>
      </div>
      
    </div>

  </div>
</section>

<!-- ======= Test Akademik Section ======= -->
<section class="section">
  <div class="container">

    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-5" data-aos="fade-up">
        <h2 class="section-heading">AKADEMIK</h2>
      </div>
    </div>

    <div class="row">

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center shadow p-2">
          <div class="wrap-icon icon-1">
            <i class="bi bi-calculator-fill"></i>
            
          </div>
          <h3 class="mb-3">Matematika</h3>
          <p>Test Matematika</p>
        </div>
      </div>

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center hover:bg-warning shadow p-2">
          <div class="wrap-icon icon-1">
            
            <i class="bi bi-bank2"></i>
          </div>
          <h3 class="mb-3">Wawasan Kebangsaan</h3>
          <p>Ujian Pengetahuan Kebangsaan</p>
        </div>
      </div>

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center shadow p-2">
          <div class="wrap-icon icon-1">
            <i class="bi bi-book"></i>
          </div>
          <h3 class="mb-3">Pengetahuan Umum</h3>
          <p>Uji Pengetahuan Umum</p>
        </div>
      </div>

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center shadow p-2">
          <div class="wrap-icon icon-1">
            <i class="bi bi-book-half"></i>
          </div>
          <h3 class="mb-3">Bahasa Indonesia</h3>
          <p>Seberapa tau kamu tentang bahasa ibu?</p>
        </div>
      </div>

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center shadow p-2">
          <div class="wrap-icon icon-1">
            <i class="bi bi-chat-left-dots-fill"></i>
          </div>
          <h3 class="mb-3">Bahasa Inggris</h3>
          <p>Test Bahasa International</p>
        </div>
      </div>
      
    </div>

  </div>
</section>

<section class="section d-none">

  <div class="container">
    <div class="row justify-content-center text-center mb-5" data-aos="fade">
      <div class="col-md-6 mb-5">
        <img src="assets/img/undraw_svg_1.svg" alt="Image" class="img-fluid">
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="step">
          <span class="number">01</span>
          <h3>Sign Up</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step">
          <span class="number">02</span>
          <h3>Create Profile</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step">
          <span class="number">03</span>
          <h3>Enjoy the app</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
        </div>
      </div>
    </div>
  </div>

</section>

<section class="section">
  <div class="container">

    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-4" data-aos="fade-up">
        <h2 class="section-heading">Keuntungan</h2>
        {{-- <p class="mb-4">Dapatkan berbagai kemudahan dengan ikut bergabung bersama kami.</p> --}}
      </div>
    </div>


    <div class="row">

      <div class="col-md-4 me-auto text-center">
        <img src="/img/time.jpg" alt="Image" class="img-fluid mb-3" width="100px">
        <h3 class="mb-4">Flexible</h3>

        <p class="mb-4">Tak semua orang memiliki waktu yang luang yang banyak, Anda bisa belajar kapan dan dimanapun menyesuaikan keinginan Anda.</p>
        
      </div>

      <div class="col-md-4 me-auto text-center">
        <img src="/img/easy.jpg" alt="Image" class="img-fluid mb-3" width="200px">
        <h3 class="mb-4">Mudah Digunakan</h3>

        <p class="mb-4">Rasakan kemudahan dalam mengakses setiap fitur yang Anda inginkan.</p>
        
      </div>

      <div class="col-md-4 me-auto text-center">
        <img src="/img/tech.jpg" alt="Image" class="img-fluid mb-3" width="200px">
        <h3 class="mb-5">Berbasis Teknologi</h3>

        <p class="mb-4">Waktunya beralih ke pembelajaran digital dengan teknologi terkini.</p>
        
      </div>    

    </div>


    <div class="row justify-content-center text-center my-5">
      <div class="col-md-5" data-aos="fade-up">
        <p><a href="{{ route('register') }}" class="btn btn-warning">Coba Sekarang</a></p>
      </div>
    </div>


  </div>
</section>


<!-- ======= Testimonials Section ======= -->
<section class="section border-top border-bottom d-none">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-4">
        <h2 class="section-heading">Review From Our Users</h2>
      </div>
    </div>
    <div class="row justify-content-center text-center">
      <div class="col-md-7">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="review text-center">
                <p class="stars">
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill muted"></span>
                </p>
                <h3>Excellent App!</h3>
                <blockquote>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                    aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                    provident voluptates consectetur maiores quos.</p>
                </blockquote>

                <p class="review-user">
                  <img src="assets/img/person_1.jpg" alt="Image" class="img-fluid rounded-circle mb-3">
                  <span class="d-block">
                    <span class="text-black">Jean Doe</span>, &mdash; App User
                  </span>
                </p>

              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="review text-center">
                <p class="stars">
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill muted"></span>
                </p>
                <h3>This App is easy to use!</h3>
                <blockquote>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                    aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                    provident voluptates consectetur maiores quos.</p>
                </blockquote>

                <p class="review-user">
                  <img src="assets/img/person_2.jpg" alt="Image" class="img-fluid rounded-circle mb-3">
                  <span class="d-block">
                    <span class="text-black">Johan Smith</span>, &mdash; App User
                  </span>
                </p>

              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="review text-center">
                <p class="stars">
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill"></span>
                  <span class="bi bi-star-fill muted"></span>
                </p>
                <h3>Awesome functionality!</h3>
                <blockquote>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                    aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                    provident voluptates consectetur maiores quos.</p>
                </blockquote>

                <p class="review-user">
                  <img src="assets/img/person_3.jpg" alt="Image" class="img-fluid rounded-circle mb-3">
                  <span class="d-block">
                    <span class="text-black">Jean Thunberg</span>, &mdash; App User
                  </span>
                </p>

              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Testimonials Section -->

<!-- ======= CTA Section ======= -->
<section class="section cta-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
        <h2>Jangan biarkan waktu berlalu</h2>
      </div>
      <div class="col-md-5 text-center text-md-end">
        <p><a href="{{ route('register') }}" class="btn d-inline-flex align-items-center btn-warning">Mulai Sekarang</a> </p>
      </div>
    </div>
  </div>
</section><!-- End CTA Section -->



@endsection