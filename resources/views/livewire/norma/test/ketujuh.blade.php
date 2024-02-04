<div>          
    @if(($waktu_mulai !==null))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-md-6 mb-4">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body text-center">
                                <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="#">PENUJUK WAKTU TEST</a>
                                <div class="row no-gutters align-items-center">
                                    <p class="mt-2 text-center">{{$NormaFa['petunjuk_kedua']??''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  

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
                            
                            @if($QuizFa)
                            <div class="card-body">                                    
                                <div class="card-body align-items-center">   
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3 text-center"></label>
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizFa['a'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">A</label>                              
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizFa['b'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">B</label>                              
                                            </div>
                                        </div>    
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizFa['c'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">C</label>                              
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizFa['d'])}}" alt="no image" style="width: 70px;height: 70px;">
                                            <label class="text-center"><span></span></label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <label class="form-control text-center">D</label>                              
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <img src="{{url('storage/photos/'.$QuizFa['e'])}}" alt="no image" style="width: 70px;height: 70px;">
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
                                    <h5>SOAL {{$QuizFa['no']}}</h5>
                                    <img src="{{url('storage/photos/'.$QuizFa['quiz'])}}" alt="no image" style="width: 250px;height: 250px;">
                                </div>
                                <div class="card-body align-items-center">   
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3 text-center"></label>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">A</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="a" 
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'a') checked @endif />
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">B</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio"  wire:model="answer" value="b" 
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'b') checked @endif/>                         
                                            </div>
                                        </div>     
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">C</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="c" 
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'c') checked @endif/>                             
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">D</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="d" 
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'd') checked @endif/>                         
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center">E</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="e" 
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'e') checked @endif />                            
                                            </div>
                                        </div>
                                                         
                                    </div>                    
                                </div>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-primary pull-right" wire:click="faSebelumnya({{$test_id}},{{$QuizFa['no']}})">
                                    Soal Sebelumnya
                                </button>
                                <button type="button" class="btn btn-primary pull-right" wire:click="faSelanjutnya({{$test_id}},{{$QuizFa['no']}})">
                                    Soal Selanjutnya
                                </button>       
                            </div>
                            @endif       

                            <div class="card-body">
                                <button type="button" id="finish" class="btn btn-primary pull-right" wire:click="faSelesai({{$test_id}})" >NEXT</button>
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
                                    <h5>PETUNJUK DAN CONTOH SOAL 07</h5>
                                </div>
                                <div class="card-body">
                                    <p>Soal 07 terdiri dari 20 pertanyaan .............................</p>
                                    <p>Soal potongan gambar. Carilah potongan gambar yang dapat membentuk gambar utuh</p>
                                    <p>Contoh Soal</p>
                                </div>
                                <div class="card-body">                                    
                                    <div class="card-body align-items-center">   
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-3 text-center"></label>
                                            <div class="col-1 form-group">
                                                <img src="{{url('/img/118_A.png')}}" alt="no image" style="width: 60px;height: 60px;">
                                                <label class="text-center"><span></span></label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <label class="form-control text-center">A</label>                              
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <img src="{{url('/img/118_B.png')}}" alt="no image" style="width: 60px;height: 60px;">
                                                <label class="text-center"><span></span></label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <label class="form-control text-center">B</label>                              
                                                </div>
                                            </div>    
                                            <div class="col-1 form-group">
                                                <img src="{{url('/img/118_C.png')}}" alt="no image" style="width: 60px;height: 60px;">
                                                <label class="text-center"><span></span></label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <label class="form-control text-center">C</label>                              
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <img src="{{url('/img/118_D.png')}}" alt="no image" style="width: 60px;height: 60px;">
                                                <label class="text-center"><span></span></label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <label class="form-control text-center">D</label>                              
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <img src="{{url('/img/118_E.png')}}" alt="no image" style="width: 60px;height: 60px;">
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
                                        <h5>SOAL 117</h5>
                                        <img src="{{url('/img/118.png')}}" alt="no image" style="width: 150px;height: 150px;">
                                    </div>
                                    <div class="card-body align-items-center">   
                                        <div class="form-group row align-items-center">
                                            <label class="col-md-3 text-center"></label>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">A</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" id="angka1" name="answer1" checked disabled />                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">B</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" id="angka2" name="answer2" disabled />                                
                                                </div>
                                            </div>     
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">C</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" id="angka3" name="answer3" disabled />                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">D</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" id="angka4" name="answer4" disabled />                                
                                                </div>
                                            </div>
                                            <div class="col-1 form-group">
                                                <label class="form-control text-center">E</label>
                                                <div class="icheck-primary icheck-inline text-center">
                                                    <input type="checkbox" id="angka5" name="answer5" disabled />                                
                                                </div>
                                            </div>                                                             
                                        </div>                    
                                    </div>                                    
                                </div>
                                <div class="card-body">                                   
                                    <p>JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>
                                    <button type="button" class="btn btn-primary text-right" wire:click="faMulai({{$test_id}})">
                                        NEXT
                                    </button>
                                </div>
                            </div> -->
                            <div class="card">
                                <div class="card-title px-4 pt-4 text-center">
                                    <h5>PETUNJUK DAN CONTOH SOAL {{$NormaFa['nama']??'INTELLIGENCE STRUCTURE TEST FA - 07'}}</h5>
                                </div>
                                <div class="card-body">
                                   <p>{!! nl2br($NormaFa['petunjuk_kesatu'] ?? '') !!}</p>                                 
                                </div>                                
                                <div class="card-body text-center">     
                                    @if($NormaFa['file_petunjuk'])                               
                                     <img src="{{ url('storage/photos/'.$NormaFa['file_petunjuk'])}}" alt="no image" > 
                                     @endif
                                </div>
                                <div class="card-body">   
                                    <p>JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                                </div>
                                <div class="card-body text-right">                                    
                                    <button type="button" class="btn btn-primary text-right" wire:click="faMulai({{$test_id}})">
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

