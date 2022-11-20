@extends('layouts.admin_full')

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
    'examid' => $id,
    'examEvent' => $exam_event
])


@endsection