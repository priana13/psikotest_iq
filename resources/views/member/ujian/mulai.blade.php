@extends('layouts.admin_full')

@section('main-content')

<div class="row">

    <div class="col">


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang <strong>
                    @auth {{ auth()->user()->name }} @endauth
                </strong></h6>
                
            </div>
            <div class="card-body">     
                
                <p>Anda Akan mengikuti Tes <strong>{{ $ujian->nama_tes }}</strong> Untuk mengikuti test ini, ada beberapa yang perlu Anda perhatikan sebagai berikut: </p>

                <h5>Waktu Pengerjaan : {{ $ujian->waktu }} Menit</h5>
                <h5>Nilai Minimal : {{ $ujian->nilai_min }}</h5>

                <h5>Catatan:</h5>
               

                {!! $ujian->peraturan !!}


                <div class="mb-3">
                    <div class="arror">
                        @error('jawaban') <span class="text-danger">Belum ada Jawaban yang Terpilih</span> @enderror                     
                    </div>
                </div>
                
                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ route('member.soal') }}" class="btn btn-default btn-sm mr-3">
                        Batal
                    </a>
                    @auth
                    <a href="{{ route('member.buat_event' , $ujian->id) }}" class="btn btn-primary btn-sm" type="submit">
                        Mulai Sekarang
                    </a>

                    @else 

                    <a href="{{ route('coba.buat_event' , $ujian->id) }}" class="btn btn-primary btn-sm" type="submit">
                        Mulai Sekarang
                    </a>

                    @endauth

                </div>                

            </div>
        </div>

    </div>


</div>



@endsection