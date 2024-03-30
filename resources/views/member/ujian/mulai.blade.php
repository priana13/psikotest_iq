@extends('layouts.admin_full')

@section('main-content')

@if(request()->is_tryout)

    <div class="row">

        @livewire('header-tryout')

        <div class="col d-flex justify-items-center"
        
        x-data="{
            sisaWaktu: 60, // detik
            textWaktu : ''    
        }"
    
        x-init="
    
        {{-- let waktu = sisaWaktu; --}}
    
        {{-- if(waktu == null || waktu == 0){
    
            localStorage.setItem('sisaWaktu123', sisaWaktu);
        } --}}
    
    
        {{-- fetch('{{ url('/api/cek-waktu/' . $exam_event->id) }}')
            .then(response => response.json())
            .then(data => sisaWaktu = data); --}}
    
    
        myinterval = setInterval(function() {  
    
            {{-- waktu = localStorage.getItem('sisaWaktu{{ $exam_event->id }}'); --}}

            {{-- waktu = 60; --}}
    
            {{-- console.log(waktu); --}}
    
            var _detik = 1000;
            var _menit = _detik * 60;
            var _jam = _menit * 60;
            var _hari = _jam * 24; 
    
            {{-- console.log(waktu) --}}
    
            if(sisaWaktu > 0){
                sisaWaktu -= 1; 
    
                {{-- localStorage.setItem('sisaWaktu{{ $exam_event->id }}' , waktu - 1);    --}}
                
                {{-- sisaWaktu = waktu; --}}
            
                var jam = Math.floor((sisaWaktu * _detik % _hari) / _jam);
                var menit = Math.floor((sisaWaktu * _detik % _jam) / _menit);
                var detik = Math.floor((sisaWaktu * _detik % _menit) / _detik);            
    
                textWaktu = jam + ':';
                textWaktu += menit + ':';
                textWaktu += detik;
    
            }
            
            
            if( sisaWaktu == 1){

    
                Swal.fire({
                    title: 'Waktu Membaca Petunjuk Soal habis',
                    text: 'Anda akan segera memulai Tes',
                    timer: 3000, // 3 detik
                    timerProgressBar: true,
                    background: '#282A3A',
                    color: '#ffff',
                    didDestroy: function(){
                        {{-- Livewire.emit('mulaiTest'); --}}
                        {{-- window.location.replace('http://127.0.0.1:8000/coba/ujian/23?is_tryout=1&kode_tryout=6608641197d32&step=1'); --}}
                    }
                });
                
    
            }      
                    
        }, 1000);   
    
              
    "
        
        >

            <h3 class="text-center my-auto"> 
                    {{-- <i class="fas fa-fw fa-clock"></i>             --}}
                <span class="btn btn-primary text-lg font-weight-bold" id="waktu2" x-text="textWaktu">0:0:0</span>        
            </h3>  

        </div>

    </div>


@endif

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
                    <a href="{{ route('member.buat_event' , $ujian->id) }}?is_tryout={{ request()->is_tryout }}&kode_tryout={{ request()->kode_tryout }}&step={{ request()->step }}" class="btn btn-primary btn-sm" type="submit">
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