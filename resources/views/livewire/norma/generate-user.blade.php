<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="card p-3">

        <div class="">
            <h5 class="" id="">Generate User</h5>
           
        </div>

        <div class="row px-2">
            <div class="col-md-6">
            

                <form action="">

                    {{-- opsi mau by qty atau by list name --}}
                    <div class="form-group mt-2">
                        
                        <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                            <label class="btn btn-outline-primary {{ $generate_by === 'qty' ? 'active' : '' }}">
                                <input type="radio" wire:model="generate_by" value="qty" autocomplete="off"
                                    {{ $generate_by === 'qty' ? 'checked' : '' }}>
                                <i class="fas fa-sort-numeric-up mr-1"></i> Quantity
                            </label>
                            <label class="btn btn-outline-primary {{ $generate_by === 'list' ? 'active' : '' }}">
                                <input type="radio" wire:model="generate_by" value="list" autocomplete="off"
                                    {{ $generate_by === 'list' ? 'checked' : '' }}>
                                <i class="fas fa-list mr-1"></i> List Name
                            </label>
                        </div>
                        @error('generate_by') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>



                    @if($generate_by === 'qty')
                    <div class="row">
        
                        <div class="form-group">
                            <label for="qty">Jumlah</label>
                            <input wire:model="qty" type="number" class="form-control" id="qty" placeholder="Qty">@error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                            @error('qty') 
                                <span class="text-sm text-danger">{{$message}}</span>
                            @enderror
                        </div>
        
                    </div>

                    @else
        
                    <div class="row">
                        <div class="form-group">
                            <label for="qty">Nama Peserta</label>
        
                            <textarea wire:model="list_nama" name="" class="form-control" id="" cols="30" rows="10"></textarea>
                            <p class="text-sm text-secondary">Pisahkan dengan enter / baris baru</p>
        
                            @error('list_nama') 
                                <span class="text-sm text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <span>Jumlah: {{$qty}}</span>
                        
                    </div>

                    @endif        
                          
        
                    <div class="">
                        <a href="{{ route('generate-user') }}" class="btn btn-secondary">Batal</a>
                        <button type="button" wire:click.prevent="generate" class="btn btn-primary">Generate</button>
                    </div>
        
        
                </form>

            </div>

            {{-- tampilkan jika ada error --}}
            @error('list_nama') 
                <span class="text-sm text-danger">{{$message}}</span>
            @enderror

            <div class="col-md-6">
                <h4>Silahkan Salin File Berikut:</h4>
                <p class="border rounded p-3">
                    {!!$hasil!!}

                </p>
            </div>
        </div>

        
    </div>
</div>
