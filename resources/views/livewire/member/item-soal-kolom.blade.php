<tr class="">
    <th class="">{{ $soal->no }}</th>

    @if (session()->has('message'))
    <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
    @endif

    <td style="width:15%;">


        <select class="form-control" wire:model="soal_a" id="">
            @foreach($list_nomor as $row)
            <option value="{{ $row }}">{{ $row }}</option>
            @endforeach
        </select>                                     

    </td>
    <td style="width:15%;">
        <select class="form-control" wire:model="soal_b" id="">
            @foreach($list_nomor as $nomor)
            <option value="{{ $nomor }}">{{ $nomor }}</option>
            @endforeach
        </select>                                     

    </td>
    <td style="width:15%;">
        <select class="form-control" wire:model="soal_c" id="">
            @foreach($list_nomor as $nomor)
            <option value="{{ $nomor }}">{{ $nomor }}</option>
            @endforeach
        </select>                                     

    </td>
    <td style="width:15%;">

        <select class="form-control" wire:model="soal_d" id="">
            @foreach($list_nomor as $nomor)
            <option value="{{ $nomor }}">{{ $nomor }}</option>
            @endforeach
        </select>                                     

    </td>
    <td style="width:15%;">

        <select class="form-control bg-primary text-white" wire:model="jawaban" style="opacity:0.8;">
            @foreach($list_nomor as $nomor)
            <option value="{{ $nomor }}">{{ $nomor }}</option>
            @endforeach
        </select> 

    </td>
    <td>
        <button class="btn btn-primary btn-sm" wire:click="updateSoal">Update</button>
        <button class="btn btn-warning btn-sm" wire:click="hapusSoal">Hapus</button>
    </td>
</tr>