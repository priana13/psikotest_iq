@extends('layouts.admin')

@section('main-content')

@section('title', __('Exams'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							List Soal </h4>
						</div>

						<a class="btn btn-sm btn-success" href="{{ route('checkout') }}">
							<i class="fa fa-plus"></i> Beli Voucher
						</a>
					</div>

					@if (session()->has('message'))
					<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
					@endif	

				</div>
				
				<div class="card-body">
					
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nama Tes</th>
								<th>Jenis</th>
								<th>Waktu</th>
								<th>Nilai Min</th>
								<th>Soal</th>
								<td class="text-center">Aksi</td>
							</tr>
						</thead>
						<tbody>
							@foreach($exams as $row)

							<?php 

								$jumlah_soal = $row->questions->count();

							?>
							<tr>								
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nama_tes }}</td>
								<td>{{ $row->type }}</td>
								<td>{{ $row->waktu }}</td>
								<td>{{ $row->nilai_min }}</td>
								<td> {{ $jumlah_soal }} </td>
								<td class="text-center">
								<div class="btn-group">
									<a href="{{route('mulai-ujian' , $row->id)}}" class="btn btn-{{ ($jumlah_soal == 0)?'secondary':'primary' }} btn-sm {{ ($jumlah_soal == 0)?'disabled':'' }}" target = "_blank">
										{{-- <i class="fas fa-lock"></i> --}}
										
										{{ ($jumlah_soal == 0)?'Belum Tersedia':'Test Sekarang' }}
									</a> 
                                    
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $exams->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection