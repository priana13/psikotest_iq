       
<div >
            <div class="card p-3">
                <div class="">
                    <h5 class="modal-title" id="createDataModalLabel">Buat Package Baru</h5>
                   
                </div>

                @if (session()->has('message'))
                <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                @endif

                
               <div class="">
                <form>
                
                
                <div class="row mt-3">
                    <div class="form-group col-sm-8">
                        <label for="name">Nama</label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>    
             

                <div class="row">

                    <div class="form-group col-sm-4">
                        <label for="qty">Qty Bulan</label>
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
                            <option value="satuan">Satuan</option>
                        </select>
                        
                        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>   

                </div>  
    
                @if($type == 'satuan')      
            

                {{-- exam / tes --}}
                <div class="card p-2 table-responsive">
                    <div class="card-header">
                        <h4 class="my-2">Tes untuk Package ini</h4>

                        <div class="row">

                            <div class="form-group col-sm-10">                              
                                <select wire:model="list_test" id="list_test" class="form-control">
                                    <option value="">Pilih Test</option>
                                    @foreach ($exams as $item)
                
                                    <option value="{{ $item->id }}">{{ $item->nama_tes }}</option>
                                        
                                    @endforeach                    
                                   
                                </select> 
                                
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-sm-2">

                            <button type="button" wire:click.prevent="tambahTest" class="btn btn-secondary close-modal">Tambah</button>  
                            </div>
    

                        </div> 
    

                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Tes</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>                          
                        </tbody>
                      </table>

                </div>
                {{-- akhir card psikotes --}}
                @endif
    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Buat</button>
                </div>
            </div>
 </div>