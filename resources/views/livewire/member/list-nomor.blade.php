<div>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">         
    
        <div class="row mx-2 my-auto">

            @foreach($exam->questions()->orderBy('no')->get() as $row)

            <?php 
            (in_array( $row->id, $sudah_dijawab))?
                $warna = 'success':
                $warna = 'light';
            ?>

            <button class="col btn btn-sm btn-{{ $warna }} m-1" wire:click="getSoal({{ $row->no }})"
           
            >{{ $row->no }}</button>
    
            @endforeach

        </div>  
        {{-- akhir row --}}

    </ul>
    <!-- End of Sidebar -->

</div>
