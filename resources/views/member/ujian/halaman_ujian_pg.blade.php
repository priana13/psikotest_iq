@extends('layouts.admin_full')

@section('sidebar')


@livewire('member.list-nomor' , [
    'exam' => $exam,    
    'examEvent' => $exam_event
])

@endsection

@section('main-content')

<!-- timmer -->
<div id='hitung-waktu btn btn-primary'>
    <h3 class="text-center"> 
    {{-- <i class="fas fa-fw fa-clock"></i>             --}}
    <span class="btn btn-primary text-lg font-weight-bold" id="waktu">0:0:0</span>        
    </h3>           
</div>

@livewire('member.ujian' , 
[
    'examid' => $exam->id,
    'examEvent' => $exam_event
])


@endsection