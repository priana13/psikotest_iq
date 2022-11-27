@extends('layouts.admin_full')

@section('sidebar')


@livewire('member.list-nomor' , [
    'exam' => $exam,    
    'examEvent' => $exam_event
])

@endsection

@section('main-content')

<!-- timmer -->
<div>
    <h3 class="text-center"> 
    <i class="fas fa-fw fa-clock"></i>            
    <span id="waktu"></span>        
    </h3>           
</div>

@livewire('member.ujian' , 
[
    'examid' => $exam->id,
    'examEvent' => $exam_event
])


@endsection