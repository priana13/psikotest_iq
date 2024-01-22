<div class="form-group my-2 text-">

    <input type="hidden" wire:model="avatar" name="avatar" id="avatar">

    <div class="item-avatar">

        <img src="{{ asset('storage/avatar/' . $avatar . '.png') }}" alt="" style="" class="img-profile rounded-circle avatar">

    </div>  

    <ul class="navbar-nav mx-auto">                                
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" role="button" data-toggle="dropdown" aria-expanded="false">
            Pilih Avatar
            </a>
            <div class="dropdown-menu d-relative" style="overflow: scroll;height: 400px;">

                {{-- karakter cowok --}}
                @for ($i=1; $i <= 10 ; $i++)

                    <a class="dropdown-item item-avatar" wire:click="pilih({{ $i }})">
                        <img src="{{ asset('storage/avatar/' . $i . '.png') }}" alt="" class="img-profile rounded-circle avatar">
                        Man {{ $i }}
                    </a>    

                @endfor    

                {{-- karakter cewek --}}
                @for ($i=11; $i <= 20 ; $i++)

                    <a class="dropdown-item item-avatar" wire:click="pilih({{ $i }})">
                        <img src="{{ asset('storage/avatar/' . $i . '.png') }}" alt="" class="img-profile rounded-circle avatar">
                        Man {{ $i }}
                    </a>    

                @endfor                                     

            
            </div>
        </li>
        
    </ul>                            
        
</div>
