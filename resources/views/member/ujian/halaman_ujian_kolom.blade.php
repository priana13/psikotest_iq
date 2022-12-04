@extends('layouts.admin_full')

@section('main-content')

@if($exam_event->status != 'Selesai')
    <!-- timmer -->
    <div id="timer" class="">
        <h3 class="text-center"> 
        <i class="fas fa-fw fa-clock"></i>            
        <span id="waktu"></span>        
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