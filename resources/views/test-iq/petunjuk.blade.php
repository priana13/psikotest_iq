
@extends('layouts.app-iq')

@section('title', 'Petunjuk – SIMKESMEN')

@push('styles')
<style>
    body { background: #fff; }
</style>
@endpush

@section('content')
<div class="max-w-2xl mx-auto px-6 py-10">

    <h2 class="text-3xl font-black mb-6"
        style="font-family:'Poppins',sans-serif; color:var(--blue-deep)">
        Petunjuk
    </h2>

    <div class="card-white p-6 fade-up" style="border-left:6px solid var(--blue-bright)">
         {{-- text petunjuk di sini --}}
         {{-- {!! $petunjuk !!} --}}

         <div class="min-h-screen bg-[#c7d9ea] px-10 py-6 font-sans">
    <h1 class="text-center text-5xl font-normal">
        Tes IST
    </h1>

    <div class="mt-12 text-black">
        <h2 class="text-4xl font-normal mb-8">
            Petunjuk
        </h2>

        <p class="text-2xl leading-relaxed mb-8">
            Tes ini terdiri dari 9 subtes.
        </p>

        <p class="text-2xl leading-relaxed mb-8 max-w-6xl">
            Pada setiap subtes akan ditampilkan petunjuk dan contoh soal
            yang harus Anda baca dan pahami sebelum Anda memulai mengerjakan.
        </p>

        <p class="text-2xl leading-relaxed">
            Kerjakan soal pada setiap subtes sesuai waktu yang tersedia.
        </p>
    </div>
  
</div>


    </div>

    <div class="mt-6 p-4 rounded-xl text-center fade-up" style="background:var(--green-soft); animation-delay:.2s">
        <span class="section-notice">✅ Saya sudah siap mengerjakan !</span>
    </div>

    <div class="mt-6 text-center fade-up" style="animation-delay:.3s">
        <p class="text-sm text-gray-500 mb-3">Klik tombol untuk memulai</p>
        <a href="{{ route('norma.test') }}" class="btn-yellow px-12 py-3 text-base inline-block">OKE</a>
    </div>

</div>
@endsection
