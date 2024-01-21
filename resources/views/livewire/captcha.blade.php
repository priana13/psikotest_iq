<div class="form-group">

    Ketik Kode Berikut: {!! $captcha !!}
    
    <a href="#" wire:click="refresh">Refresh</a>

    <input type="text" class="form-control mt-1 col-sm-6 mx-auto" name="captcha" placeholder="Security Code" required>

    @error('captcha')
        <p class="text-danger">Captcha tidak sesuai</p>
    @enderror

</div> 