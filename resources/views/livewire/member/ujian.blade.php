<div class="row">

    <div class="col">

        <!-- timmer -->
        <div>
            <h3 class="text-center"> 
            <i class="fas fa-fw fa-clock"></i>
            50:13</h3>
        </div>


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Psikotes Cerdas</h6>
                <h6><strong>{{ $step }}</strong> dari 50</h6>
            </div>
            <div class="card-body">
                <p>
                {{ $soal->soal }}
                </p>
              
                <fieldset class="form-group row">
                  
                    <div class="col-sm-10">

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-a" value="option1" checked>
                            <label class="form-check-label" for="jawaban-a">
                            A. {{ $soal->a }}
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-b" value="option2">
                            <label class="form-check-label" for="jawaban-b">
                            B. {{ $soal->b }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-c" value="option2">
                            <label class="form-check-label" for="jawaban-c">
                            C. {{ $soal->c }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-d" value="option2">
                            <label class="form-check-label" for="jawaban-d">
                            D. {{ $soal->d }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-e" value="option2">
                            <label class="form-check-label" for="jawaban-e">
                            E. {{ $soal->e }}
                            </label>
                        </div>
                   
                    </div>
                </fieldset>


                
                <div class="d-flex justify-content-center">
                    <button class="btn btn-default btn-sm mr-3">
                        Sebelunya
                    </button>
                    <button class="btn btn-primary btn-sm" wire:click="berikutnya">
                        Berikutnya
                    </button>

                </div>



            </div>
        </div>

    </div>


</div>