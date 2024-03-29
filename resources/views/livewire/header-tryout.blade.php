<div class="col-sm-10 my-3">
    <div class="text-center">       

        <div class="card p-3">

            <h3>Tahap Tryout</h3>

           <div class="d-flex mx-auto">
          
            <button class="btn mx-2 btn-sm-lg btn-primary">
                Kecerdasan
            </button>
            <button class="btn mx-2 btn-sm-lg {{ (request()->step < 2) ? 'btn-outline-secondary' : 'btn-primary' }}">
                @if( request()->step < 2 )
                <span class="badge badge-danger badge-pill badge-position"
                    style="top:-1px;"
                >x</span>
                @endif
                Kepribadian
            </button>
            <button class="btn mx-2 btn-sm-lg {{ (request()->step < 3) ? 'btn-outline-secondary' : 'btn-primary' }}"">
                @if( request()->step < 3 )
                <span class="badge badge-danger badge-pill badge-position"
                    style="top:-1px;"
                >x</span>
                @endif
                Sikap Kerja
            </button>


           </div>


        </div>
        
    </div>
    
    
</div>