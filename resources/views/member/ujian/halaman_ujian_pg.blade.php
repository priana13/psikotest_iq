@extends('layouts.admin_full')


@section('sidebar')


@livewire('member.list-nomor' , [
    'exam' => $exam,    
    'examEvent' => $exam_event
])

@endsection

@section('main-content')

<!-- timmer -->
<div id='hitung-waktu btn btn-primary'

    x-data="{
        sisaWaktu: {{ $exam_event->sisa_waktu }},
        status: '{{ $exam_event->status }}',
        textWaktu : ''    
    }"

    x-init="

    let waktu = localStorage.getItem('sisaWaktu{{ $exam_event->id }}');

    if(waktu == null || waktu == 0){

        localStorage.setItem('sisaWaktu{{ $exam_event->id }}', sisaWaktu);
    }


    fetch('{{ url('/api/cek-waktu/' . $exam_event->id) }}')
        .then(response => response.json())
        .then(data => sisaWaktu = data);


    myinterval = setInterval(function() {  

        waktu = localStorage.getItem('sisaWaktu{{ $exam_event->id }}');

        console.log(waktu);

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


    @if(request()->is_tryout)   

        <div class="row">

            <livewire:header-tryout></livewire:header-tryout>

            @if($exam_event->status != 'Selesai')    

            <div class="col d-flex justify-items-center">

                <h3 class="text-center my-auto"> 
                        {{-- <i class="fas fa-fw fa-clock"></i>             --}}
                    <span class="btn btn-primary text-lg font-weight-bold" id="waktu2" x-text="textWaktu">0:0:0</span>        
                </h3>  

            </div>

        </div>              

      
    @endif  

    @else 

        @if($exam_event->status != 'Selesai')
            <h3 class="text-center"> 
            {{-- <i class="fas fa-fw fa-clock"></i>             --}}
                <span class="btn btn-primary text-lg font-weight-bold" id="waktu2" x-text="textWaktu">0:0:0</span>        
            </h3>  
        @endif 


    @endif




 

</div>



@livewire('member.ujian' , 
[
    'examid' => $exam->id,
    'examEvent' => $exam_event
])


@endsection