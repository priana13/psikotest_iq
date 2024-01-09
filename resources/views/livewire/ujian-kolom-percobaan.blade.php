<div

>

    <style>

        .tombol {
            padding: 8px 15px 8px 15px;
            margin-bottom: 5px;
        }

    </style>

    <div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card position-relative">

                <div class="card-header text-center">                   

                    <h4 class="text-center">
                        Tes: {{ $exam->nama_tes }}
                    </h4>              

                    <h6 class="d-none">
                        Nomor: {{ $nomor }} - Soal terakhir: {{ $soal_terakhir }} - Waktu: {{ $sisa_waktu }}
                    </h6>
                  
                </div>
                
                <div class="card-body row">                  

                    @if($is_finish == TRUE)



                    <div class="mx-auto">
                         <h2 class="text-center">Tes Telah Selesai</h2>
                         <p>Terimakasih Telah Mengikuti Test ini dengan baik</p>
                         {{-- <h1 class="text-center text-primary"> <strong>{{ number_format($nilai_akhir) }}</strong></h1> --}}


                         <div class="d-flex justify-content-center">
                            <a href="{{ route('member.history') }}" class="btn btn-secondary btn-sm mr-3">
                                History
                            </a>
                            <a href="{{ route('member.hasil_ujian', $examEvent) }}" class="btn btn-success btn-sm mr-3"  type="submit">
                                Lihat Hasil
                            </a>
                            <a href="{{ route('member.soal') }}" class="btn btn-primary btn-sm"  type="submit">
                                Test Lagi
                            </a>
        
                        </div>

                        
                    </div>  
                    
                    




                    @else

                    <div class="col-md-7 mx-auto text-center">
                        <h4>Kolom {{ $kolom }} </h4>

                        <table class="table table-striped">
                            <tr class="bg-primary text-light h3">
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>E</th>                               
                            </tr>  

                            <tr class="h2">
                                <td style="width:20%;">
                                    {{ $exam_column->a }}
                                </td>
                                <td style="width:20%;">
                                    {{ $exam_column->b }}
                                </td>
                                <td style="width:20%;">
                                    {{ $exam_column->c }}
                                </td>
                                <td style="width:20%;">
                                    {{ $exam_column->d }}
                                </td>
                                <td style="width:20%;">
                                    {{ $exam_column->e }}
                                </td>  

                            </tr>
                        </table>                       

                        <div class="my-4">                          

                            <h3 class="font-bold" style="font-size:40px;margin-bottom:10px;">{{ $list_nomor }}</h3> <br>
                            
                            <div class="my-3">
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('A')" style="font-size:20px;">A</button>
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('B')" style="font-size:20px;">B</button>
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('C')" style="font-size:20px;">C</button>
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('D')" style="font-size:20px;">D</button>
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('E')" style="font-size:20px;">E</button>
                                
                            </div>                          


                        </div>
                      


                    </div>
                    @endif
                              



                </div>
            </div>
        </div>
    </div>



{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLangganan">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="modalLangganan" tabindex="-1" aria-labelledby="modalLanggananLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLanggananLabel">Percobaan Test Sudah Selesai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Silahkan daftar dan melakukan pembayaran untuk dapat akses tes secara menyeluruh</p>
        </div>
        <div class="modal-footer text-center">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="button" class="btn btn-warning mx-auto text-dark">Daftar Sekarang</button>
        </div>
      </div>
    </div>
  </div>



    @if($is_finish == FALSE)


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


    <script>

        Livewire.on('ujianSelesai', {
            alert('A post was added with the id of: ');
        })


    </script>

    @endif


</div>