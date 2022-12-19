@extends('layouts.front.index')

@section('header')
    <!-- ======= Blog Section ======= -->
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
                  <h1 data-aos="fade-up" data-aos-delay="">Blog</h1>                 
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
      <div class="row mb-5">
        @foreach($posts as $post)

        <div class="col-md-4">
          <div class="post-entry p-2 shadow">
            <a href="/page/{{ $post->slug }}" class="d-block mb-4">
              @if($post->image)
              <img src="{{ asset('storage/'.$post->image)}}" alt="Image" class="img-fluid">
              @else
              <img src="/img/gambar.jpg" alt="Image" class="img-fluid">
              @endif
            </a>
            <div class="post-text">
              <span class="post-meta">{{ $post->created_at->diffForHumans() }} &bullet; By {{ $post->user->name }}</span>
              <h3><a href="/page/{{ $post->slug }}">{{ $post->title }}</a></h3>
              {!! Str::limit($post->body, 100, ' ...') !!}
              <p><a href="/page/{{ $post->slug }}" class="readmore">Read more</a></p>
            </div>
          </div>
        </div>
       

        @endforeach

      </div>

      <div class="row">
        <div class="col-12 text-center">
          {{ $posts->links() }}
        </div>
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