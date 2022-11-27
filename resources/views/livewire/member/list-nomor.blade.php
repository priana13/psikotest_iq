<div>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">         
    
        <div class="row mx-2 my-auto">

            @foreach($exam->questions as $row)

            <button class="col btn btn-sm btn-light m-1" wire:click="getSoal({{ $row->no }})">{{ $row->no }}</button>
    
            @endforeach

        </div>  
        {{-- akhir row --}}

    </ul>
    <!-- End of Sidebar -->

</div>
