@extends('layouts.front.index')



@section('header')

<style>

.harga:hover {
  background-color: red; 
  transform: scale(1.1);

}

.harga {

  transition: transform .2s; /* Animation */

}


</style>



    <section class="hero-section inner-page">
        {{-- <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
            </g>
            </g>
        </svg>

        </div> --}}

        <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay="">Download</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Psikotest Online</p>
                </div>
            </div>
            </div>
        </div>
        </div>

    </section>

@endsection


@section('content')

<div class="container mx-auto mt-5">

        
    {{-- <h2>Halaman Download</h2> --}}


    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Urian</th>
            <th scope="col">Ukuran File</th>
            <th scope="col"></th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>4MB</td>
            <td>
                <button class="btn btn-primary btn-sm">Download</button>
            </td>
            <td>1</td>
        </tr>
        </tbody>
    </table>
    


</div>


@endsection