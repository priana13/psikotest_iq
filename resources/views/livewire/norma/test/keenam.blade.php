<div>          
    @if(($waktu_mulai !==null))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-md-6 mb-4">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body text-center">
                                <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="#">PETUJUK WAKTU TEST</a>
                                <div class="row no-gutters align-items-center">
                                    <p class="mt-2 text-center">{{$NormaZr['petunjuk_kedua']??''}}</p>
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
                        <!-- <div id="customToastr" class="custom-toastr">
                            <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  
                        </div> -->
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-title px-4 pt-4 text-center">
                                <h5>{{$nama_test}}</h5>
                            </div>
                            @if($QuizZr)
                                @foreach($QuizZr as $QZ => $q)
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-1 text-center">
                                                <h5>{{$q['no']}}</h5>
                                            </label>
                                            <h5><em>{{$q['quiz']}}</em></h5>                                            
                                        </div>                                       
                                        
                                        <div class="form-group row">
                                            <label class="col-1 text-center"></label>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">1</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="1" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">2</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="2" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>     
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">3</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="3" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">4</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="4" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">5</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="5" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">6</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="6" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">7</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="7" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">8</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="8" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">9</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="9" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">0</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" wire:model="answer{{$q['no']}}" value="0" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})"/>                                
                                                </div>
                                            </div>                   
                                        </div>                               
                                    </div>
                                @endforeach
                            @endif 
                            <div class="card-body">
                                <button id="finish" type="button" class="btn btn-primary text-right" wire:click="zrSelesai({{$test_id}})" style="display: none;">NEXT</button>
                                <button id="finish_" type="button" class="btn btn-primary text-right" onclick="confirm('Apakah anda ingin berpindah ke test tahap selanjutnya ? ')||event.stopImmediatePropagation()" wire:click="zrSelesai({{$test_id}})" >NEXT</button>
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
                            <!-- <div class="card">
                                <div class="card-title px-4 pt-4 text-center">
                                    <h5>PETUNJUK DAN CONTOH SOAL 06</h5>
                                </div>
                                <div class="card-body">
                                    <p>Soal 06 terdiri dari 20 pertanyaan .............................</p>
                                    <p>Soal deret angka. Carilah angka selanjutnya dari pola deret berikut</p>
                                    <p>Contoh Soal</p>
                                    
                                </div> 
                                <div class="card-body">              
                                    <div class="form-group row">
                                        <label class="col-1 text-center"><h5>97.</h5></label>
                                        <h5><em>2,4,6,8,10,12,14,.....</em></h5>
                                    </div>      
                                    <div class="form-group row">
                                        <label class="col-1 text-center"></label>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">1</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka1" name="answer1" checked disabled />                                
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">2</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka2" name="answer2"  disabled />                                
                                            </div>
                                        </div>     
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">3</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka3" name="answer3" disabled />                                
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">4</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka4" name="answer4" disabled />                                
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">5</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka5" name="answer5"  disabled />                                
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">6</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka6" name="answer6" checked disabled />                                
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">7</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka7" name="answer7" disabled />                                
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">8</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka8" name="answer8" />                                
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">9</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka9" name="answer9" disabled />                                
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">0</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="checkbox" id="angka0" name="answer0" disabled />                                
                                            </div>
                                        </div>                   
                                    </div>                    
                                </div>
                                <div class="card-body">
                                    
                                    <p>JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>
                                    <button type="button" class="btn btn-primary text-right" wire:click="zrMulai({{$test_id}})">
                                        NEXT
                                    </button>
                                </div> 
                            </div> -->
                            <div class="card">
                                <div class="card-title px-4 pt-4 text-center">
                                    <h5>PETUNJUK DAN CONTOH SOAL {{$NormaZr['nama']??'INTELLIGENCE STRUCTURE TEST ZR - 06'}}</h5>
                                </div>
                                <div class="card-body">
                                   <p>{!! nl2br($NormaZr['petunjuk_kesatu'] ?? '') !!}</p>                                 
                                </div>                                
                                <div class="card-body text-center">     
                                    @if($NormaZr['file_petunjuk'])                               
                                     <img src="{{ url('storage/photos/'.$NormaZr['file_petunjuk'])}}" alt="no image" style="width: 100%;height: auto;">  
                                     @endif
                                </div>
                                <div class="card-body">   
                                    <p>JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                                </div>
                                <div class="card-body text-right">                                    
                                    <button type="button" class="btn btn-primary text-right" wire:click="zrMulai({{$test_id}})">
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



