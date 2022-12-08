<div class="card shadow pb-4">
    <div class="card-header">
      <h3 class="card-title">Order Member</h3>         

    </div>
    <div class="card-body">
     
        <div class="row">

            <div class="col-md-7 pr-4 mb-5">

                <div class="row">

                    <div class="form-group col-md-10">
                        <select class="form-control" wire:model="product" id="">
                            <option value="">Select Product</option>
                            @foreach($package as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                           
                        </select>
                        @error('product') <span class="error">tes</span> @enderror
                    </div>

                    <div class="form-group col-md-2">

                        <input wire:model="qty" type="number" class="form-control">

                    </div>

                </div>
{{-- 
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="">Metode Pembayaran</label>
                        <select class="form-control" wire:model="payment_method">
                            <option value="">Pilih Methode Bayar</option>
                           
                            @foreach($list_payment_methods as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>

                            @endforeach                            
                        </select>
                    </div>

                </div> --}}



                <div class="row d-none">

                    <div class="dropdown col-md-10">
                        <button class="btn btn-light dropdown-toggle btn-block border text-left" type="button" data-toggle="dropdown" aria-expanded="false">
                          {{ $label_rekening_selected }}
                        </button>

                        <input type="hidden" wire:model="payment_method">
                        <div class="dropdown-menu">
                            @foreach($list_payment_methods as $row)
                           
                            <button class="dropdown-item" wire:click="pilihRekening({{ $row->id }})">
                                <img src="/img/bank-bca.png" alt="" width="50px" class="img img-fluid">
                                {{ $row->name }}
                            </button>

                            @endforeach    
                     
                        </div>
                      </div>

                </div>



                <div class="data-member mt-5">

                    <h3 class="font-weight-bold">Data Penerima:</h3>

                    <div class="form-group">
                        <input wire:model="nama" type="text" class="form-control" placeholder="Nama">
                    </div>


                    <div class="form-group">
                        <input wire:model="hp" type="text" class="form-control" placeholder="No Whatsapp">
                    </div>


                    <div class="form-group">
                        <input wire:model="email" type="email" class="form-control" placeholder="Email">
                    </div>


                    <div class="form-group">
                        <input wire:model="alamat" type="text" class="form-control" placeholder="Alamat">
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
                            <li class="list-group-item">Voucher Psikotes Bulanan</li>
                            <li class="list-group-item">Harga: <strong>{{ number_format($harga) }}</strong>  x <strong>{{ $qty }}</strong>  {{ $this->type[$this->productSelected->type] }}</li>
                            <li class="list-group-item">Disc : 0%</li>
                            <li class="list-group-item">PPN : 0%</li>  
                            <li class="list-group-item">Total: <strong>Rp. {{ number_format($total) }}</strong></li>                                  
                        </ul>                             

                        <h3></h3>
                    </div>                

                    <button class="btn btn-lg btn-danger m-auto" style="width:90%;"
                    wire:click="store"
                    >Beli Sekarang</button>

                </div>

                

            </div>


           


        </div>
        

    </div>
    <!-- /.card-body -->           
  
</div>
