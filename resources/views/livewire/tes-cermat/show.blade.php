<div>

    <div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card position-sticky">
                <div class="card-header d-flex justify-content-between">

                    <button class="btn btn-primary">
                        << Sebelumnya
                    </button>

                    <h4>
                        Soal Psikotes Kecermatan
                    </h4> 
             
                    <button class="btn btn-primary">
                        Next >
                    </button>
                </div>
                
                <div class="card-body row">

                    <div class="col-md-6 mx-auto text-center">
                        <h4>Kolom 1</h4>

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
                                    <input class="form-control" type="text">
                                </td>
                                <td style="width:20%;">
                                    <input class="form-control" type="text">
                                </td>
                                <td style="width:20%;">
                                    <input class="form-control" type="text">
                                </td>
                                <td style="width:20%;">
                                    <input class="form-control" type="text">
                                </td>
                                <td style="width:20%;">
                                    <input class="form-control" type="text">
                                </td>  

                            </tr>
                        </table>

                        @if(!$soalTampil)

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

                              



                </div>
            </div>
        </div>
    </div>

</div>