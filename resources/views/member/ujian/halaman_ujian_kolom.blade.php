@extends('layouts.admin_full')

@section('main-content')

@if($exam_event->status != 'Selesai')
    <!-- timmer -->
    <div id="timer" class=""
    x-data="{
        sisaWaktu: {{ $exam_event->sisa_waktu }},
        status: '{{ $exam_event->status }}'
    }"

    x-init="

    const timer = setInterval(function() {
               
        let waktu = fetch('{{ url('/api/cek-waktu/' . $exam_event->id) }}')
        .then(response => response.json())
        .then(data => sisaWaktu = data);

        console.log(sisaWaktu);


        if (sisaWaktu < 1 && status != 'Selesai') {

            {{-- clearInterval(timer);  --}}

            sisaWaktu = 'Habis';
            
            // alert('Waktu Tes Kolom ini Telah Habis');

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
            
            // emit di sini                   

         return;
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