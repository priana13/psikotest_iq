<div>

    <div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card position-sticky">
                <div class="card-header d-flex justify-content-between">
                    @if($column > 1)
                    <button class="btn btn-primary" wire:click="sebelumnya">
                        << Sebelumnya
                    </button>
                    @endif

                    <div>
                        <h4>@lang('app.Soal-Kecermatan')</h4>                           
                    </div>

                    {{-- kanan --}}
                    <div>

                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#importDataModal">Import</a>

                        @if($column < $exam->col_qty)
                 
                        <button class="btn btn-primary btn-sm" wire:click="berikutnya">
                            Next >
                        </button>
    
                        @else
    
                        <a href="{{ route('admin.exams') }}" class="btn btn-warning btn-sm">Selesai</a>
    
                        @endif 

                    </div>


                </div>
                
                <div class="card-body row">
                   

                    <div class="col-md-10 mx-auto text-center">

                        <h4>Nama Tes: <strong>{{ $exam->nama_tes }}</strong> </h4> 


                        <h4>Kolom {{ $column }}</h4>

                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tr>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>E</th>  
                                <th>Action</th>                             
                            </tr>                           

                            <tr>
                                <td style="width:20%;">
                                    <input class="form-control" type="text" wire:model="a">
                                </td>
                                <td style="width:20%;">
                                    <input class="form-control" type="text" wire:model="b">
                                </td>
                                <td style="width:20%;">
                                    <input class="form-control" type="text" wire:model="c">
                                </td>
                                <td style="width:20%;">
                                    <input class="form-control" type="text" wire:model="d">
                                </td>
                                <td style="width:20%;">
                                    <input class="form-control" type="text" wire:model="e">
                                </td>  
                                <td>
                                    <button class="btn btn-sm btn-primary" wire:click="updateKolom">Update</button>
                                </td>

                            </tr>
                        </table>

                        @if(!$soalTampil)

                        <button class="btn btn-warning mx-auto" wire:click="buatsoal">Generate Soal</button>

                        @else

                        @if(count($list_soal) >= 1)

                        <div class="">  

                            <table class="table">
                                <?php $i = 1; ?>     
                                
                                <tr>
                                    <td colspan="5">Soal</td>                                   
                                    <td>Jawaban</td>
                                    <td><button  class="btn btn-sm btn-danger"
                                        data-toggle="modal" data-target="#hapusModal">Hapus Semua</button> 
                                    
                                    </td>
                                </tr>

                                @if (session()->has('message'))
                                <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:2px;"> {{ session('message') }} </div>
                                @endif

                                @foreach ($list_soal as $soal)

                                <livewire:member.item-soal-kolom :soal="$soal" :list_nomor="$list_nomor" :wire:key="$soal->id">
                                    
                                @endforeach
                               
                            </table>


                        </div>

                        @else 

                        <p>Soal Belum Tersedia</p>

                        <button class="btn btn-primary mx-auto btn-sm" wire:click="buatsoal">Generate Soal</button>

                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#importDataModal">Import</a>

                        @endif

                        @endif


                    </div>               

                              



                </div>
            </div>
        </div>
    </div>

    @include('livewire.tes-cermat.import')
    @include('livewire.tes-cermat.modal-hapus')



</div>