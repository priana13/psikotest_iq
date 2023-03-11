<div>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">         
    
        <div class="row mx-2 my-auto">

            @foreach($exam->questions()->orderBy('no')->get() as $row)

            <?php 
            (in_array( $row->id, $sudah_dijawab))?
                $warna = 'success':
                $warna = 'light'; 
                
            (isset($jawaban[$row->id]))?
                        $jawaban_key= "." . $jawaban[$row->id]:
                        $jawaban_key="";
            ?>

            <button class="col-2 btn btn-sm btn-{{ $warna }} my-1 ml-1 px-1" wire:click="getSoal({{ $row->no }})"
           
            >{{ $row->no }}{{ $jawaban_key }}</button>
    
            @endforeach

        </div>  
        {{-- akhir row --}}

    </ul>
    <!-- End of Sidebar -->

</div>
