@extends('layouts.admin_full')

@section('main-content')

<div class="row mb-3 d-flex justify-content-center">
    <h2> <strong>Konfirmasi Pembayaran</strong> </h2>
</div>

<div class="row">

    <div class="col-md-7 m-auto">

        <div class="card shadow pb-4">          
         
            <div class="card-body">
             
                <div class="row">

                    <div class="col py-2 px-5 mb-5">  

                       <div class="form-group">
                        <label for=""> <strong>Order ID</strong>   </label>
                        <input type="text" class="form-control form-control-lg">
                       </div> 
                                      
                        <div class="form-group">
                         <label for=""><strong>Atas Nama Rekening</strong> </label>
                         <input type="text" class="form-control form-control-lg">
                        </div>
                                         
                        <div class="form-group">
                         <label for=""><strong>Transfer ke</strong> </label>
                         <input type="text" class="form-control form-control-lg">
                        </div>
                                   
                        <div class="form-group">
                         <label for=""><strong>Tanggal Transfer</strong> </label>
                         <input type="date" class="form-control form-control-lg">
                        </div>
                                      
                        <div class="form-group">
                         <label for=""><strong>Jumlah Transfer</strong> </label>
                         <input type="text" class="form-control form-control-lg">
                        </div>
                                    
                        <div class="form-group">
                         <label for=""><strong>Bukti Transfer</strong> </label>
                         <input type="file" class="form-control form-control-lg">
                        </div>

                        <button class="btn btn-primary btn-block btn-lg">Kirim</button>

                    </div>

                    <!-- /.Akhir col-->  


                </div>
                 <!-- /.card-row -->  
                

            </div>
            <!-- /.card-body -->           
          
        </div>

          
    </div>
</div>



@endsection