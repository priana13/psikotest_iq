@section('title', __('Transactions'))
<div class="">
	<div class="row justify-content-center">
		<div class="col-md-12">

			{{-- header --}}

			<div class="d-flex justify-content-end">
				<div>
					<h4>Jumlah Data: {{ $transactions->count() }}</h4>
				</div>

				<div class="mx-2">
					<a href="{{ route('offline.registrasi') }}" class="btn btn-sm btn-info" target="_blank">Formulir</a>
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
