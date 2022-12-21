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
                        <h4>Soal Psikotes Kecermatan</h4>                           
                    </div>

                    {{-- kanan --}}
                    <div>

                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#importDataModal">Import</a>

                        @if($column < 4)
                 
                        <button class="btn btn-primary btn-sm" wire:click="berikutnya">
                            Next >
                        </button>
    
                        @else
    
                        <a href="{{ route('admin.exams') }}" class="btn btn-warning btn-sm">Selesai</a>
    
                        @endif 

                    </div>


                </div>
                
                <div class="card-body row">
                   

                    <div class="col-md-8 mx-auto text-center">

                        <h4>Nama Tes: <strong>{{ $exam->nama_tes }}</strong> </h4> 


                        <h4>Kolom {{ $column }}</h4>

                        <table class="table table-striped">
                            <tr>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>E</th>                               
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

                            </tr>
                        </table>

                        @if(!$soalTampil)

                        <button class="btn btn-warning mx-auto" wire:click="buatsoal">Buat Soal</button>

                        @else

                        <div class="">                                                
                           

                            <table class="table">
                                <?php $i = 1; ?>     
                                
                                <tr>
                                    <td colspan="5">Soal</td>                                   
                                    <td>Jawaban</td>
                                </tr>

                                @if (session()->has('message'))
                                <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:2px;"> {{ session('message') }} </div>
                                @endif

                                @foreach ($list_soal as $soal)

                                <livewire:member.item-soal-kolom :soal="$soal" :list_nomor="$list_nomor" :wire:key="$soal->id">
                                    
                                @endforeach
                               
                            </table>


                        </div>

                        @endif


                    </div>               

                              



                </div>
            </div>
        </div>
    </div>

    @include('livewire.tes-cermat.import')


</div>