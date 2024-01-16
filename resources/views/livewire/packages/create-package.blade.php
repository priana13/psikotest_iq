       
<div >
            <div class="card p-3">
                <div class="">
                    <h5 class="modal-title" id="createDataModalLabel">Buat Paket Harga Baru</h5>
                   
                </div>

                @if (session()->has('message'))
                <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                @endif

                
               <div class="">
                <form>
                
                
                <div class="row mt-3">
                    <div class="form-group col-sm-8">
                        <label for="name">Nama</label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nama Paket">@error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>    
             

                <div class="row">

                    <div class="form-group col-sm-4">
                        <label for="qty">Bulan/Qty</label>
                        <input wire:model="qty" type="number" class="form-control" id="qty" placeholder="Qty">@error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="price">Harga</label>
                        <input wire:model="price" type="number" class="form-control" id="price" placeholder="Price">@error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
              
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <textarea wire:model="detail" id="" class="form-control" cols="30" rows="6"></textarea>                
                    @error('detail') <span class="text-danger">{{ $message }}</span> @enderror
                </div>


                <div class="row">

                    <div class="form-group col-sm-4">
                        <label for="type">Type Akses</label>
                        <select wire:model="type" id="type" class="form-control">
                            <option value="">Type</option>
                            <option value="full">Full Akses</option>
                            <option value="kategori">Per Kategori</option>
                            <option value="satuan">Satuan</option>
                            <option value="iq">Test IQ</option>

                        </select>
                        
                        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>   

                    @if($type == 'kategori')

                    <div class="form-group col-sm-4">        
                        <label for="type">Kategory</label>                      
                        <select wire:model="kategori" id="kategori" class="form-control">
                            <option value="">Pilih Kategori Test</option>
                            @foreach ($exam_categories as $kategori)
        
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                
                            @endforeach                    
                        
                        </select> 
                        
                        @error('kategori') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
        
                    @endif

                </div>  
                
                
                
    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Buat</button>
                </div>
            </div>
 </div>