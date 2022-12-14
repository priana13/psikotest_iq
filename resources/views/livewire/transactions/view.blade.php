@section('title', __('Transactions'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4> <i class="fas fa-tasks"></i>
							Transaksi </h4>
						</div>
					
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Transactions">
						</div>
						<div class="btn btn-sm btn-success" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Tambah Transaksi
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.transactions.create')
						@include('livewire.transactions.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>User</th>								
								<th>Payment Type</th>
								<th>Qty Bulan</th>
								<th>Nominal</th>
								<th>Status</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($transactions as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->user->name }}</td>								
								<td>{{ $row->payment_type }}</td>
								<td>{{ $row->qty }}</td>
								<td>{{ number_format($row->nominal) }}</td>
								<td>
									<span class="badge badge-{{ $warna_status[$row->status] }}">{{ $row->status }}</span>
									
								</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Transaction id {{$row->id}}? \nDeleted Transactions cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a> 
									
									<a class="dropdown-item" onclick="confirm('Selesaikan Transaksi ini \n Akses Psikotes untuk transaksi ini akan di Aprove')||event.stopImmediatePropagation()" wire:click="aprove({{$row->id}})">
										<i class="fa fa-check"></i> Selesai 
									</a>   


									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $transactions->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
