@extends('layouts.front.index')

@section('header')
    <section class="hero-section inner-page">
        <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
            </g>
            </g>
        </svg>

        </div>

        <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay="">Harga Membership</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Dapatkan akses ke semua Soal Psikotes</p>
                </div>
            </div>
            </div>
        </div>
        </div>

    </section>

@endsection

@section('content')

<section class="section">
  <div class="container">

    <div class="row justify-content-center text-center">
      <div class="col-md-7 mb-5">
        <h2 class="section-heading">Pilihan Paket</h2>
        <p></p>
      </div>
    </div>
    <div class="row align-items-stretch">

      @foreach($list_paket as $paket)

      <div class="col-lg-4 mb-4 mb-lg-0 my-2">
        <div class="pricing h-100 text-center">
          <span>&nbsp;</span>
          <h3>{{ $paket->name }}</h3>
          <ul class="list-unstyled">
            <li>Akses {{ $paket->qty }} Bulan</li>

            @if($paket->type == 'full')
            <li>Unlimited Test</li>
            @endif

          </ul>
          <div class="price-cta">
            <strong class="price">{{ $paket->qty }} Bulan</strong>
            <p><a href="{{ route('checkout') }}?paket={{ $paket->id }}" class="btn btn-white">Berlangganan</a></p>
          </div>
        </div>
      </div>

      @endforeach

      {{-- <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="pricing h-100 text-center popular">
          <span class="popularity">Most Popular</span>
          <h3>Professional</h3>
          <ul class="list-unstyled">
            <li>Akses 3 Bulan</li>
            <li>Unlimited Soal</li>
          </ul>
          <div class="price-cta">
            <strong class="price">3 Bulan</strong>
            <p><a href="{{ route('login') }}" class="btn btn-white">Choose Plan</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="pricing h-100 text-center">
          <span class="popularity">Best Value</span>
          <h3>Ultimate</h3>
          <ul class="list-unstyled">
            <li>Akses 1 tahun</li>
            <li>Unlimited Soal</li>
          </ul>
          <div class="price-cta">
            <strong class="price">1 Tahun</strong>
            <p><a href="{{ route('login') }}" class="btn btn-white">Choose Plan</a></p>
          </div>
        </div>
      </div> --}}

    </div>
  </div>
</section>

  <!-- ======= CTA Section ======= -->
  <section class="section cta-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
          <h2>Mulai Psikotes Sekarang</h2>
        </div>
        <div class="col-md-5 text-center text-md-end">
          <p><a href="{{ route('register') }}" class="btn d-inline-flex align-items-center"><span>Register</span></a> </p>
        </div>
      </div>
    </div>
  </section><!-- End CTA Section -->



@endsection