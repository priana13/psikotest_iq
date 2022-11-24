@extends('layouts.admin_full')

@section('sidebar')



    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">         
    
        <div class="row mx-2 my-auto">

            @foreach($exam->questions as $row)

            <button class="col btn btn-sm btn-light m-1" >{{ $row->no }}</button>
    
            @endforeach

        </div>  
        {{-- akhir row --}}

    </ul>
    <!-- End of Sidebar -->

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