{{-- =====================================================
     resources/views/welcome.blade.php
     Route: GET /
     ===================================================== --}}
@extends('layouts.app-iq')

@section('title', 'Gema Persona')

@push('styles')
<style>
    body {
        background: linear-gradient(160deg, var(--blue-deep) 0%, var(--blue-bright) 60%, #5c6bc0 100%);
        position: relative;
        /* HAPUS: overflow: hidden — ini yang menyebabkan tidak bisa scroll */
        min-height: 100vh;
    }
    body::before {
        content: ''; position: fixed; top: -80px; right: -80px;
        width: 420px; height: 420px; border-radius: 50%;
        background: rgba(255,255,255,0.05); pointer-events: none;
        /* Gunakan fixed agar dekorasi tidak ikut scroll */
    }
</style>
@endpush

@section('content')
{{-- GANTI: justify-between → justify-center + gap, HAPUS: min-h-screen dari sini --}}
<div class="max-w-lg mx-auto px-6 py-12 flex flex-col items-center gap-8 text-center">

    {{-- Header --}}
    <div class="fade-up w-full">
        <h1 class="text-4xl font-black text-white leading-tight"
            style="font-family:'Poppins',sans-serif;">
            SELAMAT DATANG
        </h1>
        <p class="text-yellow-300 font-bold text-lg mt-5" style="font-family:'Poppins',sans-serif;">
           Sistem Psikotes Terpadu
        </p>
        <p class="text-blue-200 text-sm mt-0.5">Mohon Tunggu Sebentar</p>
    </div>

    <div>
    
    
    </div>

    {{-- Gambar --}}
    <div class="fade-up flex justify-center w-full h-32" style="animation-delay:.15s">
        {{-- <img src="{{ asset('gambar/1.png') }}"
             alt="SIMKESMEN"
             class="w-2/3 sm:w-1/2 object-contain rounded-2xl drop-shadow-xl"> --}}
    </div>

    {{-- CTA --}}
    <div class="fade-up w-full" style="animation-delay:.3s">
        <p class="text-blue-200 text-sm mb-4 text-center">
            Silahkan klik tombol dibawah untuk melanjutkan
        </p>
        <a href="{{ route('norma.test.biodata') }}" class="btn-yellow px-10 py-3 text-base w-full block text-center">
            MULAI
        </a>
    </div>

</div>
@endsection