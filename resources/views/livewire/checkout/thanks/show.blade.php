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

                       @if($transaksi->status == 'success')

                       <button class="btn btn-outline-success">{{ $transaksi->status }}</button>

                       @else

                       {{-- <button class="btn btn-outline-secondary">Salin Nominal</button> --}}

                       <a class="btn btn-outline-success" href="{{ route('checkout.thanks' , $transaksi->id) }}">Bayar Sekarang</a>

                       @endif

                       @if($transaksi->paymentMethod)
                       <h4 class="mt-5">Ke Rekening Berikut:</h4>

                       <div class="row">
                        

                        <div class="card col-md-6 m-auto px-2 py-3">

                            <img class="mx-auto mb-2" src="/img/bank-bca.png" alt="" width="100px">

                           
                            <h2 class="my-2">No. Rek: {{ $transaksi->paymentMethod->no_rek }}</h2>
                           

                            <h4 class="mb-2">Atas nama: Indra Himawan</h4>

                            <button class="btn btn-outline-secondary">Salin Rekening</button>

                            

                        </div>                      


                       </div>
                       @endif


                       <h4 class="mt-5">Konfirmasikan pembayaran anda di: <a href="{{ route('checkout.konfirmasi' , $transaksi->code) }}">Konfirmasi Pembayaran</a> </h4>


                    </div>


                </div>
                

            </div>
            <!-- /.card-body -->           
          
        </div>

          
    </div>

   

        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="{{
            !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
            data-client-key="{{ config('services.midtrans.clientKey')
        }}"></script>
                
        
        
        
        <script type="text/javascript">
            @if($status_transaksi == 'Pending')
          
                // SnapToken acquired from previous step
                snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
                });

            @endif
            
        </script>


  
</div>