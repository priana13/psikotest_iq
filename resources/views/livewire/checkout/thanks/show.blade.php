<div class="row">

    <div class="col-md-9 m-auto">

        <div class="card shadow pb-4">          
         
            <div class="card-body">
             
                <div class="row">

                    <div class="col p-3 mb-5 text-center">
                       
                       <h2 class="mb-3"><strong>Terimakasih sudah melakukan order Voucher Bulanan</strong></h2> 

                       <h4 class="mb-3">Untuk menyelesaikan proses order, silahkan transfer sejumlah</h4>

                       <h1 class="text-success font-bold">
                        <strong>Rp {{ number_format($transaksi->nominal) }}</strong> 
                       </h1>

                       <button class="btn btn-outline-secondary">Salin Nominal</button>

                       <h4 class="mt-5">Ke Rekening Berikut:</h4>


                       <div class="row">

                        <div class="card col-md-6 m-auto px-2 py-3">

                            <img class="mx-auto mb-2" src="/img/bank-bca.png" alt="" width="100px">

                            <h2 class="my-2">No. Rek: 0952606202</h2>

                            <h4 class="mb-2">Atas nama: Indra Himawan</h4>

                            <button class="btn btn-outline-secondary">Salin Rekening</button>

                        </div>


                       </div>


                       <h4 class="mt-5">Konfirmasikan pembayaran anda di: <a href="{{ route('checkout.konfirmasi') }}">Konfirmasi Pembayaran</a> </h4>


                    </div>


                </div>
                

            </div>
            <!-- /.card-body -->           
          
        </div>

          
    </div>
</div>