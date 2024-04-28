@section('title', __('Transactions'))
<div class="">
	<div class="row justify-content-center">
		<div class="col-md-12">

			{{-- header --}}

			<div class="d-flex justify-content-between">
				<div>
					<h4>Jumlah Data: 0</h4>
				</div>				

			</div>

			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4> <i class="fas fa-tasks"></i>
							Daftar Tes Tryout </h4>
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
								<th>#Id</th> 								
								<th>Nama Peserta</th>
								<th>Kode Tryout</th>								
								<th>Tanggal</th>
								<th>Nilai</th>							
								<th class="text-center">Status</th>
								{{-- <th>Action</th> --}}
							</tr>
						</thead>
						<tbody>

                            @foreach ($hasil_tryout as $tryout )
                                <tr>
                                    <td>{{ $tryout->id }}</td>
                                    <td>{{ $tryout->user->name }}</td>
                                    <td>{{ $tryout->kode_tryout }}</td>
                                    <td>{{ $tryout->created_at }}</td>
                                    <td>{{ $tryout->nilai }}</td>
                                    <td>{{ $tryout->status }}</td>
                                </tr>
                                
                            @endforeach
						
						</tbody>
					</table>						
                    {{-- paginate --}}
                    {{ $hasil_tryout->links() }}
					</div>					
	

				</div>


			</div>
		</div>
	</div>
</div>
