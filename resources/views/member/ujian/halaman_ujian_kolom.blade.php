@extends('layouts.admin_full')

@section('main-content')

@if($exam_event->status != 'Selesai')
    <!-- timmer -->
    <div id="timer" class=""
    x-data="{
        sisaWaktu: 0,
        status: '{{ $exam_event->status }}'
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

        {{-- console.log(waktu) --}}

        if(waktu > 0){
            {{-- sisaWaktu -= 1;  --}}

            localStorage.setItem('sisaWaktu{{ $exam_event->id }}' , waktu - 1);

            sisaWaktu = waktu;

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
        <h3 class="text-center"> 
        <i class="fas fa-fw fa-clock"></i>            
        <span id="waktu"></span>        

        <span 
            x-text="sisaWaktu"
        ></span>
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