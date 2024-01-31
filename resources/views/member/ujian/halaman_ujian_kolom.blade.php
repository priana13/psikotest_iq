@extends('layouts.admin_full')

@section('main-content')

@if($exam_event->status != 'Selesai')
    <!-- timmer -->
    <div id="timer" class=""
    x-data="{
        sisaWaktu: 0,
        status: '{{ $exam_event->status }}',
        textWaktu : ''
    }"

    x-init="

    let waktu = localStorage.getItem('sisaWaktu{{ $exam_event->id }}');

    if(waktu == null || waktu == 0){

        localStorage.setItem('sisaWaktu{{ $exam_event->id }}', 60);
    }

    {{-- console.log(waktu); --}}

    {{-- 

    console.log(localStorage.getItem('sisaWaktu{{ $exam_event->id }}')); --}}

    fetch('{{ url('/api/cek-waktu/' . $exam_event->id) }}')
        .then(response => response.json())
        .then(data => sisaWaktu = data);


    myinterval = setInterval(function() {  

        waktu = localStorage.getItem('sisaWaktu{{ $exam_event->id }}');

        var _detik = 1000;
        var _menit = _detik * 60;
        var _jam = _menit * 60;
        var _hari = _jam * 24; 

        {{-- console.log(waktu) --}}

        if(waktu > 0){
            {{-- sisaWaktu -= 1;  --}}

            localStorage.setItem('sisaWaktu{{ $exam_event->id }}' , waktu - 1);   
            
            sisaWaktu = waktu;
           
            var jam = Math.floor((sisaWaktu * _detik % _hari) / _jam);
            var menit = Math.floor((sisaWaktu * _detik % _jam) / _menit);
            var detik = Math.floor((sisaWaktu * _detik % _menit) / _detik);            

            textWaktu = jam + ':';
            textWaktu += menit + ':';
            textWaktu += detik;

        }
        
        
        if( waktu == 1){

            Swal.fire({
                title: 'WAKTU HABIS',
                text: 'Pindah kolom berikutnya',
                timer: 3000, // 3 detik
                timerProgressBar: true,
                background: '#282A3A',
                color: '#ffff',
                didDestroy: function(){
                    Livewire.emit('waktuHabis');
                }
            });
            

        }      
                
    }, 1000);   

              
    "

    >
        <h3 class="text-center h1"> 
        {{-- <i class="fas fa-fw fa-clock"></i>             --}}
        <span id="waktu"></span>        

        <span class="btn btn-primary font-weight-bold"
            x-text="textWaktu"
        >0:0:0</span>
        </h3>           
    </div>

@endif

@livewire('member.ujian-kolom' , 
[
    'exam' => $exam,
    'examEvent' => $exam_event,
    'kolom' => $kolom
])


@push('scripts')
    <script>

        Livewire.on('ujianSelesai', id => {

            $('#timer').hide();

        });


    </script>
@endpush


@endsection