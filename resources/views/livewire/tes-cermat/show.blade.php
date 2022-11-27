<div>

    <div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card position-sticky">
                <div class="card-header d-flex justify-content-between">

                    <button class="btn btn-primary" wire:click="sebelumnya">
                        << Sebelumnya
                    </button>

                    <div>
                        <h4>Soal Psikotes Kecermatan</h4>                           
                    </div>


             
                    <button class="btn btn-primary" wire:click="berikutnya">
                        Next >
                    </button>
                </div>
                
                <div class="card-body row">
                    @if($column == 0)

                    <div class="col">

                        <div class="form-group">
                            <label for="nama-tes">Nama Tes</label>
                            <input type="text" class="form-control" wire:model="namatest">
                        </div>

                        <div class="form-group">
                            <label for="peraturan">Intruksi Soal</label>
                            <textarea wire:model="peraturan" class="form-control" name="" id="peraturan" cols="30" rows="10"></textarea>
                        </div>
    

                        <div class="row">

                            <div class="form-group col-3">
                                <label for="waktu">Waktu</label>
                                <input type="number" class="form-control" wire:model="waktu">
                            </div>

                            <div class="form-group col-3">
                                <label for="nilai_min">Nilai Min</label>
                                <input type="number" class="form-control" wire:model="nilai_min">
                            </div>


                        </div>

                        <button class="btn btn-primary" wire:click="berikutnya">Berikutnya</button>


                    </div>

                    @else                    


                    <div class="col-md-6 mx-auto text-center">

                        <h4>Nama Tes: <strong>{{ $namatest }}</strong> </h4> 


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

                        @if(!$soalTampil && $isSoalAda)

                        <button class="btn btn-warning mx-auto" wire:click="buatsoal">Buat Soal</button>

                        @else

                        <div class="">

                            <h4>Soal</h4>

                            <table class="table">
                                
                                @for ($i = 1; $i <= 50; $i++)
    
                                <tr class="">
                                    <th class="">{{ $i }}</th>
                                    <td class="">6</td>
                                    <td class="">5</td>
                                    <td class="">4</td>
                                    <td class="">3</td>
                                    <td style="width:20%;">
                                        <input class="form-control" type="text">
                                    </td>
                                </tr>
                                    
                                @endfor
                               
                            </table>


                        </div>

                        @endif


                    </div>

                    @endif 
                    {{-- akhir if column == 0 --}}

                              



                </div>
            </div>
        </div>
    </div>

</div>