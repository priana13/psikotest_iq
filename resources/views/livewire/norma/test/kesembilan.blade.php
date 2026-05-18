<div>  
       
   @if($status == 0)
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-md-6 mb-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">
                            <div class="row no-gutters align-items-center">
                                <p class="mt-2 text-center">{{$NormaMind['petunjuk_kesatu']??''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  
                                <h1 class="text-white-100 text-center" id="countdown"></h1>

                            </div>
                        </div>
                        <div id="customToastr" class="custom-toastr">
                            <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  
                        </div>
                    </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-title px-4 pt-4 text-center">
                            <!-- <h5>{{$nama_test}}</h5> -->
                            <p> HAFALKAN KELOMPOK KATA-KATA DIBAWAH INI</p>
                        </div>
                        
                        <div class="card-footer pt-4 col-md-6 mx-auto" >   
                            @if($QuizMind)
                            <table>
                           
                                @foreach($QuizMind as $QG => $q)
                              
                                    <tr style="margin-top:15px; word-spacing: 5px;">
                                        <td style="width:100px;" class="py-1"><strong>{{$q['quiz']}}</strong></td>
                                        <td>:</td>
                                        <td class="px-1"> <span>{{$q['uraian']}}</span></td>
                                    </tr>                              

                                
                                @endforeach
                            </table>
                            @endif
                        </div>
                            
                        
                        <div class="card-footer">
                            <button id="finish" type="button" class="btn btn-primary text-right" wire:click="mulaiSekarang()" style="display: none;">
                                    NEXT
                                </button>
                        </div>
                        
                     
                    </div>
                </div>
            </div>
        </div>
    @else
        <div>
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-title px-4 pt-4 text-center">
                                    <h5>PETUNJUK DAN CONTOH SOAL {{$NormaMind['nama']??'INTELLIGENCE STRUCTURE TEST MIND - 09'}}</h5>
                                </div>
                                <div class="card-body">
                                   <p>{!! nl2br($NormaMind['petunjuk_kesatu'] ?? '') !!}</p>                                 
                                </div>                                
                                <div class="card-body text-center">     
                                    @if($NormaMind['file_petunjuk'])                               
                                     <img src="{{ url('storage/photos/'.$NormaMind['file_petunjuk'])}}" alt="no image" style="width: 100%;height: auto;">  
                                     @endif
                                </div>
                                <div class="card-body text-center">   
                                    <p class="h3">JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                                </div>
                                <div class="card-body text-right text-center">
                                    <button type="button" class="btn btn-primary btn-lg" wire:click="waMulai({{$test_id}})">
                                        NEXT
                                    </button>
                                </div>
                            </div>
                        

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>




