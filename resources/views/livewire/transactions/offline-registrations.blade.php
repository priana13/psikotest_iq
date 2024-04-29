@section('title', __('Transactions'))
<div class="">	
	  
	  <style>
		@supports (-webkit-appearance: none) or (-moz-appearance: none) {
		  .checkbox-wrapper-14 input[type=checkbox] {
			--active: #275EFE;
			--active-inner: #fff;
			--focus: 2px rgba(39, 94, 254, .3);
			--border: #BBC1E1;
			--border-hover: #275EFE;
			--background: #fff;
			--disabled: #F6F8FF;
			--disabled-inner: #E1E6F9;
			-webkit-appearance: none;
			-moz-appearance: none;
			height: 21px;
			outline: none;
			display: inline-block;
			vertical-align: top;
			position: relative;
			margin: 0;
			cursor: pointer;
			border: 1px solid var(--bc, var(--border));
			background: var(--b, var(--background));
			transition: background 0.3s, border-color 0.3s, box-shadow 0.2s;
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:after {
			content: "";
			display: block;
			left: 0;
			top: 0;
			position: absolute;
			transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:checked {
			--b: var(--active);
			--bc: var(--active);
			--d-o: .3s;
			--d-t: .6s;
			--d-t-e: cubic-bezier(.2, .85, .32, 1.2);
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:disabled {
			--b: var(--disabled);
			cursor: not-allowed;
			opacity: 0.9;
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:disabled:checked {
			--b: var(--disabled-inner);
			--bc: var(--border);
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:disabled + label {
			cursor: not-allowed;
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:hover:not(:checked):not(:disabled) {
			--bc: var(--border-hover);
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:focus {
			box-shadow: 0 0 0 var(--focus);
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:not(.switch) {
			width: 21px;
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:not(.switch):after {
			opacity: var(--o, 0);
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:not(.switch):checked {
			--o: 1;
		  }
		  .checkbox-wrapper-14 input[type=checkbox] + label {
			display: inline-block;
			vertical-align: middle;
			cursor: pointer;
			margin-left: 4px;
		  }
	  
		  .checkbox-wrapper-14 input[type=checkbox]:not(.switch) {
			border-radius: 7px;
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:not(.switch):after {
			width: 5px;
			height: 9px;
			border: 2px solid var(--active-inner);
			border-top: 0;
			border-left: 0;
			left: 7px;
			top: 4px;
			transform: rotate(var(--r, 20deg));
		  }
		  .checkbox-wrapper-14 input[type=checkbox]:not(.switch):checked {
			--r: 43deg;
		  }
		  .checkbox-wrapper-14 input[type=checkbox].switch {
			width: 38px;
			border-radius: 11px;
		  }
		  .checkbox-wrapper-14 input[type=checkbox].switch:after {
			left: 2px;
			top: 2px;
			border-radius: 50%;
			width: 17px;
			height: 17px;
			background: var(--ab, var(--border));
			transform: translateX(var(--x, 0));
		  }
		  .checkbox-wrapper-14 input[type=checkbox].switch:checked {
			--ab: var(--active-inner);
			--x: 17px;
		  }
		  .checkbox-wrapper-14 input[type=checkbox].switch:disabled:not(:checked):after {
			opacity: 0.6;
		  }
		}
	  
		.checkbox-wrapper-14 * {
		  box-sizing: inherit;
		}
		.checkbox-wrapper-14 *:before,
		.checkbox-wrapper-14 *:after {
		  box-sizing: inherit;
		}
	  </style>
	  


	<div class="row justify-content-center">
		<div class="col-md-12">

			{{-- header --}}

			<div class="d-flex justify-content-between">
				<div>
					<h4>Jumlah Data: {{ $total_data }}</h4>
				</div>

				<div class="d-flex">

					<div class="mx-2">
						<a href="{{ route('offline.registrasi') }}" class="btn btn-sm btn-info {{ (!$form_status) ? 'disabled' : '' }}" target="_blank">Formulir</a>
					</div>
	
					<div class="checkbox-wrapper-14">
						<input wire:model="form_status" id="s1-14" type="checkbox" class="switch"
							wire:change='ubah_status'
						>
						<label for="s1-14">Aktifkan</label>
					</div>


				</div>


			</div>

			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4> <i class="fas fa-tasks"></i>
							DAFTAR PESERTA REGISTRASI </h4>
						</div>
					
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif

						{{-- <div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Cari Transaksi">
						</div>
						<div class="btn btn-sm btn-success" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Tambah Transaksi
						</div> --}}

					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.transactions.create')
						@include('livewire.transactions.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#Id</td> 	
								<td width="100px">Tanggal</td>							
								<th>Nama</th>
								<th>Jenis Kelamin</th>								
								<th>No Hp</th>
								<th>Minat</th>

								<th>Alamat</th>
                                <th>Email</th>
								<th class="text-center">Status Pembayaran</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($transactions as $row)
							<tr>
								<td>{{ $row->id }}</td> 
								<td>{{ $row->created_at->format('d-m-Y') }}</td>								
								<td>{{ $row->nama}}</td>
								<td>{{ $row->jenis_kelamin }}</td>								
								<td>{{ $row->hp }}</td>
								<td>{{ $row->minat }}</td>
                                <td>{{ $row->alamat }}</td>
                                {{-- <td></td> --}}
								<td>{{ $row->email }}</td>
								<td class="text-center">
									<span class="badge badge-{{ $warna_status[$row->status] }} text-white">{{ $row->status }}</span>
									
								</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">																 
									<a href="#" class="dropdown-item" onclick="confirm('Confirm Delete Transaction id {{$row->id}}? \nDeleted Transactions cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a> 
									
									<a href="#" class="dropdown-item" onclick="confirm('Selesaikan Transaksi ini \n Akses Psikotes untuk transaksi ini akan di Aprove')||event.stopImmediatePropagation()" wire:click="aprove({{$row->id}})">
										<i class="fa fa-check"></i> Selesai 
									</a>  
									
									@if($row->package)

									@if($row->package->type == 'iq')

									<a href="{{ route('admin.transactions.akses_user', $row->id) }}" class="dropdown-item" >
										<i class="fa fa-users"></i> Akses User 
									</a>   

									@endif

									@endif

									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $transactions->links() }}
					</div>

					{{-- footer card --}}
					<div class="d-flex justify-content-end mt-4">

						@if($transactions->count() > 0)

						<button class="btn btn-sm btn-danger mx-2" wire:click="hapus">
							<i class="fa fa-trash"></i>  Hapus Data
						</button>


						<button class="btn btn-sm btn-success" wire:click="download">
							<i class="fa fa-download"></i>  Download
						</button>

						@endif	

					</div>
					{{-- end footer card --}}
	

				</div>


			</div>
		</div>
	</div>
</div>
