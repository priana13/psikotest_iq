<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="card p-3">

        <div class="">
            <h5 class="" id="">Generate User</h5>
           
        </div>

        <div class="row px-2">
            <div class="col-md-6">

                <form action="">
{{-- 
                    <div class="row">
        
                        <div class="form-group">
                            <label for="qty">Jumlah</label>
                            <input wire:model="qty" type="number" class="form-control" id="qty" placeholder="Qty">@error('qty') <span class="text-danger">{{ $message }}</span> @enderror
                            @error('qty') 
                                <span class="text-sm text-danger">{{$message}}</span>
                            @enderror
                        </div>
        
                    </div> --}}
        
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
        
        
                    {{-- <div class="row">
        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input wire:model="password" type="text" class="form-control" id="password" placeholder="password">@error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            @error('password') 
                                <span class="text-sm text-danger">{{$message}}</span>
                            @enderror
                        </div>
        
                    </div> --}}
        
                    <div class="">
                        <a href="{{ route('generate-user') }}" class="btn btn-secondary">Batal</a>
                        <button type="button" wire:click.prevent="generate" class="btn btn-primary">Generate</button>
                    </div>
        
        
                </form>

            </div>

            <div class="col-md-6">
                <h4>Silahkan Salin File Berikut:</h4>
                <p class="border rounded p-3">
                    {!!$hasil!!}

                </p>
            </div>
        </div>

        
    </div>
</div>
