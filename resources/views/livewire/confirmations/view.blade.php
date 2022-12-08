@section('title', __('Confirmations'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Konfirmasi </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Confirmations">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i> Tambah Konfirmasi
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.confirmations.create')
						@include('livewire.confirmations.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Transaction Id</th>
								<th>Atas Nama</th>
								<th>Rek Tujuan</th>
								<th>Tanggal Tf</th>
								<th>Jumlah</th>
								<th>Bukti Transfer</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($confirmations as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->transaction_id }}</td>
								<td>{{ $row->atas_nama }}</td>
								<td>{{ $row->rek_tujuan }}</td>
								<td>{{ $row->tanggal_tf }}</td>
								<td>{{ $row->jumlah }}</td>
								<td>
									<a href="{{ asset('storage/' . $row->bukti_transfer) }}" target = "_blank">Lihat</a>
									
									
								</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Confirmation id {{$row->id}}? \nDeleted Confirmations cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $confirmations->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
