<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">

                <div class="card border-0 shadow-sm overflow-hidden" style="margin-top: 2rem;">

                    {{-- Header --}}
                    <div class="card-header text-center py-4" style="background-color: #185FA5;">
                        <h4 class="mb-1 font-weight-normal text-white" style="letter-spacing: 0.04em;">
                            Hasil Intelligence Structure Test
                        </h4>
                        <p class="mb-0 small" style="color: #B5D4F4;">Gema Persona</p>
                    </div>

                    <div class="card-body px-5 py-4">

                        {{-- Data Peserta --}}
                        <p class="text-uppercase text-muted mb-2" style="font-size: 11px; letter-spacing: 0.06em; font-weight: 600;">Data Peserta</p>
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered mb-0" style="font-size: 13px;">
                                <tbody>
                                    <tr>
                                        <td class="bg-light text-muted font-weight-bold" style="width: 180px;">No. Test</td>
                                        <td>{{ $userNorma['nomor_test'] ?? '-' }}</td>
                                        <td class="bg-light text-muted font-weight-bold" style="width: 180px;">Tgl. Test</td>
                                        <td>{{ isset($userNorma['created_at']) ? \Carbon\Carbon::parse($userNorma['created_at'])->format('d-m-Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-light text-muted font-weight-bold">Nama</td>
                                        <td>{{ $name ?? '-' }}</td>
                                        <td class="bg-light text-muted font-weight-bold">Tgl. Lahir</td>
                                        <td>{{ isset($userNorma['tgl_lahir']) ? \Carbon\Carbon::parse($userNorma['tgl_lahir'])->format('d-m-Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-light text-muted font-weight-bold">Usia</td>
                                        <td>{{ isset($userNorma['tgl_lahir']) ? \Carbon\Carbon::parse($userNorma['tgl_lahir'])->age . ' tahun' : '-' }}</td>
                                        <td class="bg-light text-muted font-weight-bold">Instansi / Sekolah</td>
                                        <td>{{ $userNorma['instansi'] ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- Tabel Subtest --}}
                        <p class="text-uppercase text-muted mb-2" style="font-size: 11px; letter-spacing: 0.06em; font-weight: 600;">Hasil per Subtest</p>
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered table-sm text-center mb-0" style="font-size: 13px;">
                                <thead>
                                    <tr style="background-color: #185FA5;">
                                        <th class="text-left text-white border-0" style="width: 60px;"></th>
                                        @foreach(['SE','WA','AN','GE','RA','ZR','FA','WU','ME'] as $col)
                                            <th class="text-white border-0" style="font-weight: 500; letter-spacing: 0.04em;">{{ $col }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($normaTest)
                                    <tr>
                                        <td class="text-left bg-light text-muted font-weight-bold px-3">RW</td>
                                        <td>{{ $normaTest['se'] }}</td>
                                        <td>{{ $normaTest['wa'] }}</td>
                                        <td>{{ $normaTest['an'] }}</td>
                                        <td>{{ $normaTest['ge'] }}</td>
                                        <td>{{ $normaTest['ra'] }}</td>
                                        <td>{{ $normaTest['zr'] }}</td>
                                        <td>{{ $normaTest['fa'] }}</td>
                                        <td>{{ $normaTest['wu'] }}</td>
                                        <td>{{ $normaTest['me'] }}</td>
                                    </tr>
                                    @endif
                                    @if($sw)
                                    <tr>
                                        <td class="text-left bg-light text-muted font-weight-bold px-3">SW</td>
                                        <td>{{ $sw['se'] }}</td>
                                        <td>{{ $sw['wa'] }}</td>
                                        <td>{{ $sw['an'] }}</td>
                                        <td>{{ $sw['ge'] }}</td>
                                        <td>{{ $sw['ra'] }}</td>
                                        <td>{{ $sw['zr'] }}</td>
                                        <td>{{ $sw['fa'] }}</td>
                                        <td>{{ $sw['wu'] }}</td>
                                        <td>{{ $sw['me'] }}</td>
                                    </tr>
                                    @endif
                                    @if($kat)
                                    <tr style="background-color: #E6F1FB;">
                                        <td class="text-left font-weight-bold px-3" style="background-color: #B5D4F4; color: #0C447C;">KAT</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['se'] }}</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['wa'] }}</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['an'] }}</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['ge'] }}</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['ra'] }}</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['zr'] }}</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['fa'] }}</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['wu'] }}</td>
                                        <td style="color: #0C447C; font-weight: 600;">{{ $kat['me'] }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{-- Ringkasan --}}
                        <p class="text-uppercase text-muted mb-2" style="font-size: 11px; letter-spacing: 0.06em; font-weight: 600;">Ringkasan Hasil</p>
                        <div class="row no-gutters" style="gap: 10px; display: flex;">
                            <div class="col text-center p-3 rounded" style="background: #f8f9fc;">
                                <div class="text-muted small text-uppercase font-weight-bold" style="font-size: 11px; letter-spacing: 0.05em;">Total RW</div>
                                <div class="h4 font-weight-bold mb-0 mt-1">{{ $total_rw }}</div>
                            </div>
                            <div class="col text-center p-3 rounded" style="background: #f8f9fc;">
                                <div class="text-muted small text-uppercase font-weight-bold" style="font-size: 11px; letter-spacing: 0.05em;">Total SW</div>
                                <div class="h4 font-weight-bold mb-0 mt-1">{{ $total_sw }}</div>
                            </div>
                            <div class="col text-center p-3 rounded" style="background: #E6F1FB;">
                                <div class="font-weight-bold small text-uppercase" style="font-size: 11px; letter-spacing: 0.05em; color: #185FA5;">IQ</div>
                                <div class="font-weight-bold mb-0 mt-1" style="font-size: 28px; color: #0C447C;">{{ $iq }}</div>
                            </div>
                            <div class="col text-center p-3 rounded" style="background: #f8f9fc;">
                                <div class="text-muted small text-uppercase font-weight-bold" style="font-size: 11px; letter-spacing: 0.05em;">Kategori</div>
                                <div class="h5 font-weight-bold mb-0 mt-1">{{ $kategori }}</div>
                            </div>
                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="card-footer bg-white text-right border-top py-3 px-5">
                        <button onclick="window.print()" class="btn btn-primary btn-sm px-4">
                            <i class="fas fa-print mr-1"></i> Cetak Hasil
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>