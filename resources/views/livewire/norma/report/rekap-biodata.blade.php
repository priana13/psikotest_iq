@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">

        <h1 class="mb-4">Rekap Biodata</h1>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="pt-2">
                            <div class="table-responsive">
                                <table id="tableRekap" class="table table-bordered table-sm table-hover w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nomor</th>
                                            <th>Pangkat</th>
                                            <th>Tgl Lahir</th>
                                            <th>Umur</th>
                                            <th>Instansi</th>
                                            <th>Angkatan</th>

                                            @foreach($kriteria_test as $kriteria)

                                            <th>{{ $kriteria }}-rw</th>
                                            <th>{{ $kriteria }}-sw</th>                                          

                                            @endforeach

                                            <th>Total RW</th>

                                            <th>IQ</th>
                                            <th>Tgl Test</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_norma as $row)

                                     
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ($row->nama) ? $row->nama : $row->user->name }}</td>
                                            <td>{{ $row->nomor_test }}</td>
                                            <td>{{ $row->pangkat }}</td>
                                            <td>{{ $row->tgl_lahir }}</td>
                                            <td>{{ ($row->usia) ? $row->usia . 'th' : '' }}</td>
                                            <td>{{ $row->instansi }}</td>
                                            <td>{{ $row->angkatan_tahun }}</td>

                                            <?php $total_rw = 0; ?>

                                            @foreach($kriteria_test as $kriteria)

                                                <?php 

                                                    $score = $score_subtes->where('nomor_test', $row->nomor_test)->where('user_id', $row->user_id)->first();  
                                                    $total_rw += $score->$kriteria;                                            

                                                ?>

                                                <td>{{ $score->$kriteria }}</td>
                                                <td>{{ $getKunciNorma($row->usia, $kriteria, $score->$kriteria) }}</td>

                                            @endforeach

                                            <td>{{ $total_rw }}</td>

                                            <td>{{ $row->user?->iq }}</td>
                                            <td>{{ date("d-m-Y" , strtotime($row->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


{{-- CSS: masuk ke <head> via push jika layout mendukung @stack('styles'),
     atau taruh langsung di sini (Bootstrap 4 izinkan style di body) --}}
@push('scripts')

{{-- DataTables CSS (boleh di sini karena Bootstrap 4 toleran) --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">
<style>
    #tableRekap thead th { background-color: #343a40; color: #fff; vertical-align: middle; white-space: nowrap; }
    #tableRekap tbody tr:hover { background-color: #f1f3f5; }
    div.dataTables_wrapper div.dataTables_filter input { border-radius: 20px; padding: 4px 12px; }
    .dt-buttons .btn { border-radius: 6px !important; font-size: 13px; }
</style>

{{-- DataTables JS — TANPA jQuery karena sudah di-load layout --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

{{-- Buttons & Export --}}
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
$(document).ready(function () {
    $('#tableRekap').DataTable({
        language: {
            search:       "Cari:",
            lengthMenu:   "Tampilkan _MENU_ data",
            info:         "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            infoEmpty:    "Tidak ada data",
            infoFiltered: "(difilter dari _MAX_ total data)",
            zeroRecords:  "Data tidak ditemukan",
            paginate: { first: "Pertama", last: "Terakhir", next: "»", previous: "«" }
        },
        pageLength: 25,
        lengthMenu: [10, 25, 50, 100, { label: 'Semua', value: -1 }],
        dom: '<"row mb-2"<"col-sm-6"B><"col-sm-6"f>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row mt-2"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel mr-1"></i> Excel',
                className: 'btn btn-success btn-sm',
                title: 'Rekap Biodata',
                exportOptions: { columns: ':visible' }
            },           
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf mr-1"></i> PDF',
                className: 'btn btn-danger btn-sm',
                title: 'Rekap Biodata',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print mr-1"></i> Print',
                className: 'btn btn-secondary btn-sm',
                title: 'Rekap Biodata',
                exportOptions: { columns: ':visible' }
            }
        ],
        order: [[0, 'asc']]
    });
});
</script>

@endpush