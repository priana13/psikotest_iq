@extends('layouts.front.index')

@section('header')

<section class="section" style="background: rgb(165,197,226);
background: linear-gradient(112deg, rgba(165,197,226,1) 0%, rgba(84,150,208,1) 51%, rgba(47,110,166,1) 85%); padding-top:50px;">

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">

    <div class="carousel-indicators d-relative z-10">

      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      
    </div>

    <div class="carousel-inner">

      <div class="carousel-item active">
          

          <div class="" style="padding-top:200px;" >
        
            <div class="container">
              <div class="row align-items-center">
                <div class="col-12 hero-text-image">
                  <div class="row">
                    <div class="col-lg-8 text-center text-lg-start">
                      <h1 class="text-white" data-aos="fade-right">Belajar Mudah - Akses Dimanapun</h1>
                      <p class="mb-5 text-white" data-aos="fade-right" data-aos-delay="100">Persiapkan dirimu untuk mengikuti tes seleksi Polri - TNI.</p>
                      <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="{{ route('register') }}" class="btn btn-warning">Mulai Sekarang</a></p>
                    </div>
                    <div class="col-lg-4 iphone-wrap">
                      {{-- <img src="assets/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right"> --}}
                      <img src="img/icon-psikotest.png" alt="Image" class="img-fluid rounded" data-aos="fade-right" data-aos-delay="200">
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
      
      </div>
      
       
      </div>

      <div class="carousel-item">
          
          <div class="" style="padding-top:200px;" >
        
            <div class="container">
              <div class="row align-items-center">
                <div class="col-12 hero-text-image">
                  <div class="row">
                    <div class="col-lg-8 text-center text-lg-start">
                      <h2 data-aos="fade-right" style="color:white;">Anda membutuhkan test IQ?</h2>
                      <p class="mb-5 text-white" data-aos="fade-right" data-aos-delay="100">Cepat, Akurat, Terpercaya</p>
                      <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="{{ route('register') }}" class="btn btn-warning">Test Sekarang</a></p>
                    </div>
                    <div class="col-lg-4 iphone-wrap">
                      {{-- <img src="assets/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right"> --}}
                      <img src="img/icon-iq.png" alt="Image" class="img-fluid rounded shadow z-1" data-aos="fade-right" data-aos-delay="200">
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
      
      </div>

      
      </div>
     
    </div>

    <button class="carousel-control-prev d-relative z-11" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next d-relative z-4 " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    
  </div>

</section>



@endsection

@section('content')



<section class="section px-2" style="background: rgb(165,197,226);
background: linear-gradient(112deg, rgba(165,197,226,1) 0%, rgb(170, 207, 240) 51%, rgb(131, 188, 238) 85%); padding-top:50px;">

  <div class="container">
    <h2 class="fw-bold section-heading">PSIKOTEST</h2>
  </div>

  <div class="container" data-aos="fade-up">
    
    <div class="row bg-white rounded p-3">

      <div class="col-md-1">
        <div class="wrap-icon icon-1 rounded-pill p-3">
          <i class="bi bi-clipboard2-check-fill" style="font-size: 40px;"></i>
          
        </div>
      </div>

      <div class="col-md-6">
        <h2>TryOut Test Sikap Kerja</h2>
        <p>Mencari angka/huruf/simbol yang hilang</p>

        <a href="{{ route('coba.mulai_ujian' , 9) }}" class="btn btn-warning btn-sm">Coba Gratis</a>
      </div>

      <div class="col-md-5 text-center mt-2">  

        <img src="img/icon-iq.png" alt="sample-test-sikap-kerja" class="img img-thumbnail" width="200px">

      </div>
    </div>

  </div>

  <div class="container my-2" data-aos="fade-up">

    <div class="row bg-white rounded p-3">

      <div class="col-md-1">
        <div class="wrap-icon icon-1 rounded-pill p-3">
          <i class="bi bi-thermometer-sun" style="font-size: 40px;"></i>
          
        </div>
      </div>

      <div class="col-md-6">
        <h2>TryOut Test Kecerdasan</h2>
        <p>Uji kemampuan dengan soal-soal yang diprediksi sering keluar</p>        
      </div>    
    </div> <!-- akhir row -->


    <div class="row bg-white rounded p-3 mt-2">

      <div class="col-md-1">
        <div class="wrap-icon icon-1 rounded-pill p-3">
          <i class="bi bi-person-badge" style="font-size: 40px;"></i>
          
        </div>
      </div>

      <div class="col-md-6">
        <h2>TryOut Test Kepribadian</h2>
        <p>Uji kemampuan dengan mengerjakan soal-soal kepribadian</p>        
      </div>    
    </div> <!-- akhir row -->


  </div > <!-- akhir container -->

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
        <div class="feature-1 text-center shadow-sm p-2">
          <div class="wrap-icon icon-1">
            <i class="bi bi-calculator-fill"></i>
            
          </div>
          <h3 class="mb-3">Matematika</h3>
          <p>Test Matematika</p>
        </div>
      </div>

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center hover:bg-warning shadow-sm p-2">
          <div class="wrap-icon icon-1">
            
            <i class="bi bi-bank2"></i>
          </div>
          <h3 class="mb-3">Wawasan Kebangsaan</h3>
          <p>Ujian Pengetahuan Kebangsaan</p>
        </div>
      </div>

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center shadow-sm p-2">
          <div class="wrap-icon icon-1">
            <i class="bi bi-book"></i>
          </div>
          <h3 class="mb-3">Pengetahuan Umum</h3>
          <p>Uji Pengetahuan Umum</p>
        </div>
      </div>

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center shadow-sm p-2">
          <div class="wrap-icon icon-1">
            <i class="bi bi-book-half"></i>
          </div>
          <h3 class="mb-3">Bahasa Indonesia</h3>
          <p>Seberapa tau kamu tentang bahasa ibu?</p>
        </div>
      </div>

      <div class="col-6 col-sm-4 my-3" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-1 text-center shadow-sm p-2">
          <div class="wrap-icon icon-1">
            <i class="bi bi-chat-left-dots-fill"></i>
          </div>
          <h3 class="mb-3">Bahasa Inggris</h3>
          <p>Test Bahasa International</p>
        </div>
      </div>
      
    </div>


    <div class="mt-3">

      <a href="{{ route('register') }}" class="btn btn-warning btn-sm">Daftar Sekarang</a>

    </div>

  </div>



</section>

{{-- Section test khusus iq --}}

<section class="section px-2" style="background: rgb(165,197,226);
background: linear-gradient(112deg, rgba(165,197,226,1) 0%, rgba(84,150,208,1) 51%, rgba(47,110,166,1) 85%); padding-top:50px;">

  <div class="container">
    <h2 class="fw-bold text-white">TES KHUSUS</h2>
  </div>

  <div class="container" data-aos="fade-up">
    
    <div class="row rounded p-3">

      <div class="col-md-1">
        <div class="wrap-icon icon-1 rounded-pill p-3 text-white">
          <i class="bi bi-clipboard2-check-fill" style="font-size: 40px;"></i>
          
        </div>
      </div>

      <div class="col-md-6 text-white">
        <h2>INTELECTUAL QUOTIENT (IQ)</h2>
        <p>Tes yang memberikan gambaran intelegensi atau kemampuan kognitif individu</p>

        <a href="{{ route('register') }}" class="btn btn-warning btn-sm">Tes Sekarang</a>
      </div>

      <div class="col-md-5 text-center mt-2">  

        <img src="img/brain.png" alt="sample-test-sikap-kerja" class="img img-thumbnail" width="200px">

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