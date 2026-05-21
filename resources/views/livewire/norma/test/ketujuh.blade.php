<div>          
    @if(($waktu_mulai !==null))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-md-6 mb-4">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body text-center">
                                <div class="row no-gutters align-items-center">
                                    <p class="mt-2 text-center">{{$NormaFa['petunjuk_kedua']??''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <x-card-timer>

                            <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  
                            <h1 class="text-white-100 text-center" id="countdown"></h1>

                        </x-card-timer>
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
                                <div class="card-title px-4 text-center">
                                    <h5>SOAL {{$QuizFa['no']}}</h5>
                                    <img src="{{url('storage/photos/'.$QuizFa['quiz'])}}" alt="no image" style="width: 250px;height: 250px;">
                                </div>
                                <div class="card-body align-items-center">   
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3 text-center"></label>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center" for="option_a">A</label>
                                            <div class="icheck-primary icheck-inline text-center" >
                                                <input type="radio" wire:model="answer" value="a" id="option_a" 
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'a') checked @endif />
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center" for="option_b">B</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio"  wire:model="answer" value="b"  id="option_b" 
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'b') checked @endif/>                         
                                            </div>
                                        </div>     
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center" for="option_c">C</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="c" id="option_c"
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'c') checked @endif/>                             
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center" for="option_d">D</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="d" id="option_d"
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'd') checked @endif/>                         
                                            </div>
                                        </div>
                                        <div class="col-1 form-group">
                                            <label class="form-control text-center" for="option_e">E</label>
                                            <div class="icheck-primary icheck-inline text-center">
                                                <input type="radio" wire:model="answer" value="e" id="option_e"
                                                wire:change="updateDatabase({{$QuizFa['id']}},{{$QuizFa['no']}})"
                                                @if($answer === 'e') checked @endif />                            
                                            </div>
                                        </div>
                                                         
                                    </div>                    
                                </div>
                            </div>
                            <div class="card-body mx-auto">
                                <button type="button" class="btn btn-primary pull-right" wire:click="faSebelumnya({{$test_id}},{{$QuizFa['no']}})">
                                    Soal Sebelumnya
                                </button>
                                <button type="button" class="btn btn-primary pull-right" wire:click="faSelanjutnya({{$test_id}},{{$QuizFa['no']}})">
                                    Soal Selanjutnya
                                </button>       
                            </div>
                            @endif       

                            <div class="card-body text-right">
                                <button type="button" id="finish" class="btn btn-primary text-right" wire:click="faSelesai({{$test_id}})" style="display: none;">NEXT</button>
                                <button type="button" id="finish_" class="btn btn-primary text-right" onclick="confirm('Apakah anda ingin berpindah ke test tahap selanjutnya ? ')||event.stopImmediatePropagation()" wire:click="faSelesai({{$test_id}})" >NEXT</button>
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
                                    <h5>PETUNJUK DAN CONTOH SOAL {{$NormaFa['nama']??'INTELLIGENCE STRUCTURE TEST FA - 07'}}</h5>
                                </div>
                                <div class="card-body">
                                   <p>{!! nl2br($NormaFa['petunjuk_kesatu'] ?? '') !!}</p>                                 
                                </div>                                
                                <div class="card-body text-center">     
                                    @if($NormaFa['file_petunjuk'])                               
                                     <img src="{{ url('storage/photos/'.$NormaFa['file_petunjuk'])}}" alt="no image" style="width: 100%;height: auto;">  
                                     @endif
                                </div>
                                <div class="card-body text-center">   
                                    <p class="h3">JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                                </div>
                                <div class="card-body text-right text-center">
                                    <button type="button" class="btn btn-primary btn-lg" wire:click="faMulai({{$test_id}})">
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

