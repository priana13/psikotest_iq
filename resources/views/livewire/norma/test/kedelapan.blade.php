<div>          
    @if(($waktu_mulai !==null))
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-md-6 mb-4">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body text-center">
                                <div class="row no-gutters align-items-center">
                                    <p class="mt-2 text-center">{{$NormaWu['petunjuk_kedua']??''}}</p>
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
                        @if($QuizWu)
                        <div class="card">
                            <div class="card-title px-4 pt-4 text-center">
                                <h5>{{$nama_test}}</h5>
                            </div>
                            
                               
                            <div class="card-body">                                    
                                <div class="card-body align-items-center">   
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3 text-center"></label>
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizWu['a'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">A</label>                              
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizWu['b'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">B</label>                              
                                            </div>
                                        </div>    
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizWu['c'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">C</label>                              
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizWu['d'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">D</label>                              
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizWu['e'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">E</label>                              
                                            </div>
                                        </div>
                                                         
                                    </div>                    
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-title px-4 pt-4 text-center">
                                    <h5>SOAL {{$QuizWu['no']}}</h5>
                                    <img src="{{url('storage/photos/'.$QuizWu['quiz'])}}" alt="no image" style="width: 250px;height: 250px;">
                                </div>
                                <div class="card-body align-items-center">   
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3 text-center"></label>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">A</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="a" 
                                                wire:change="updateDatabase({{$QuizWu['id']}},{{$QuizWu['no']}})"/>
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">B</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio"  wire:model="answer" value="b" 
                                                wire:change="updateDatabase({{$QuizWu['id']}},{{$QuizWu['no']}})"/>                         
                                            </div>
                                        </div>     
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">C</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="c" 
                                                wire:change="updateDatabase({{$QuizWu['id']}},{{$QuizWu['no']}})"/>                             
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">D</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="d" 
                                                wire:change="updateDatabase({{$QuizWu['id']}},{{$QuizWu['no']}})"/>                         
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">E</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="e" 
                                                wire:change="updateDatabase({{$QuizWu['id']}},{{$QuizWu['no']}})"/>                            
                                            </div>
                                        </div>
                                                         
                                    </div>                    
                                </div>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-primary pull-right" wire:click="wuSebelumnya({{$test_id}},{{$QuizWu['no']}})">
                                    Soal Sebelumnya
                                </button>
                                <button type="button" class="btn btn-primary pull-right" wire:click="wuSelanjutnya({{$test_id}},{{$QuizWu['no']}})">
                                    Soal Selanjutnya
                                </button>       
                            </div>
                                                                    
                            <div class="card-body text-right">
                                <button id="finish"  type="button" class="btn btn-primary text-right" wire:click="wuSelesai({{$test_id}})" style="display: none;">NEXT</button>
                                <button id="finish_"  type="button" class="btn btn-primary text-right" onclick="confirm('Apakah anda ingin berpindah ke test tahap selanjutnya ? ')||event.stopImmediatePropagation()" wire:click="wuSelesai({{$test_id}})" >NEXT</button>
                            </div>
                            
                            
                        </div>
                        @endif  
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
                                    <h5>PETUNJUK DAN CONTOH SOAL {{$NormaWu['nama']??'INTELLIGENCE STRUCTURE TEST WU - 08'}}</h5>
                                </div>
                                <div class="card-body">
                                   <p>{!! nl2br($NormaWu['petunjuk_kesatu'] ?? '') !!}</p>                                 
                                </div>                                
                                <div class="card-body text-center">     
                                    @if($NormaWu['file_petunjuk'])                               
                                     <img src="{{ url('storage/photos/'.$NormaWu['file_petunjuk'])}}" alt="no image" style="width: 100%;height: auto;">  
                                     @endif
                                </div>
                                <div class="card-body text-center">   
                                    <p class="h3">JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                                </div>
                                <div class="card-body text-right text-center">
                                    <button type="button" class="btn btn-primary btn-lg" wire:click="wuMulai({{$test_id}})">
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

