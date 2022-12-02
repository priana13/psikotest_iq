@extends('layouts.admin_full')

@section('main-content')

<div class="row mb-3">
    <img class="m-auto" src="img/credit-card.png" alt="">
</div>

<div class="row">

    <div class="col-md-9 m-auto">

        <div class="card shadow pb-4">
            <div class="card-header">
              <h3 class="card-title">Order Member</h3>         

            </div>
            <div class="card-body">
             
                <div class="row">

                    <div class="col-md-7 pr-4 mb-5">

                        <div class="row">

                            <div class="form-group col-md-10">
                                <select class="form-control" name="" id="">
                                    <option value="">Select Product</option>
                                    <option value="bulanan" selected>Bulanan</option>
                                    <option value="">Mingguan</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">

                                <input type="number" value="1" class="form-control">

                            </div>

                        </div>


                        <div class="data-member mt-5">

                            <h3 class="font-weight-bold">Data Penerima:</h3>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama">
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="No Whatsapp">
                            </div>


                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Alamat Lengkap">
                            </div>

                            

                        </div>
                       

                    </div>

                    <div class="col-md-5">
                        <h3>Yang Anda Dapatkan:</h3>

                        <ul>
                            <li>Try Out Kecerdasan </li>
                            <li>Try Out Kecermatan</li>
                            <li>Try Out Kepribadian</li>
                            <li>Dapat Melihat Riwayat Try Out</li>
                            <li>Dan Banyak Fitur Lainnya</li>
                        </ul>


                        <div class="card">
                            <div class="card-header">
                                Rincian Pesanan:
                            </div>
                            <div class="card-body">


                                <ul class="list-group">
                                    <li class="list-group-item">Voucher Psikotes Bulanan x 3</li>
                                    <li class="list-group-item">Harga: 200.000 x 3</li>
                                    <li class="list-group-item">Disc : 0%</li>
                                    <li class="list-group-item">PPN : 0%</li>  
                                    <li class="list-group-item">Total: <strong>Rp. 400.000</strong></li>                                  
                                </ul>                             

                                <h3></h3>
                            </div>

                            <button class="btn btn-lg btn-danger m-auto" style="width:90%;">Beli Sekarang</button>

                        </div>

                        

                    </div>


                   


                </div>
                

            </div>
            <!-- /.card-body -->           
          
        </div>

          
    </div>
</div>



@endsection