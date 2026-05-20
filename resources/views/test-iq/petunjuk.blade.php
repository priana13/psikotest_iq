@extends('layouts.app-iq')

@section('title', 'Petunjuk – GEMAPERSONA')

@push('styles')
<style>
    body { background: #fff; }
</style>
@endpush

@section('content')
<div class="max-w-2xl mx-auto px-6 py-10 lg:max-w-3xl">

    <h2 class="text-3xl font-black mb-6"
        style="font-family:'Poppins',sans-serif; color:var(--blue-deep)">
        Petunjuk
    </h2>

    <div class="card-white p-8 fade-up" style="border-left:6px solid var(--blue-bright)">

        <h1 class="text-center text-4xl font-normal mb-6">
            Tes IST
        </h1>

        <div class="text-black">
            <h2 class="text-3xl font-normal mb-6">
                Petunjuk
            </h2>

            <p class="text-xl leading-relaxed mb-5">
                Tes ini terdiri dari 9 subtes.
            </p>

            <p class="text-xl leading-relaxed mb-5">
                Pada setiap subtes akan ditampilkan petunjuk dan contoh soal
                yang harus Anda baca dan pahami sebelum Anda memulai mengerjakan.
            </p>

            <p class="text-xl leading-relaxed">
                Kerjakan soal pada setiap subtes sesuai waktu yang tersedia.
            </p>
        </div>

    </div>

    <div class="mt-6 p-4 rounded-xl text-center fade-up"
         style="background:var(--green-soft); animation-delay:.2s">
        <span class="section-notice">✅ Saya sudah siap mengerjakan !</span>
    </div>

    <div class="mt-6 text-center fade-up" style="animation-delay:.3s">
        <p class="text-sm text-gray-500 mb-3">Klik tombol untuk memulai</p>
        <a href="{{ route('norma.test') }}" class="btn-yellow px-12 py-3 text-base inline-block">OKE</a>
    </div>

</div>
@endsection