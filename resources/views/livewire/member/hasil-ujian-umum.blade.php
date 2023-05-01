@extends('layouts.admin_full')

@section('main-content')


<div class="container">
    <div class="row" >

        <div class="col m-auto p-3" style="max-width: 1024px;" id="halaman">

            <div class="card bg-white shadow p-5" >

                @if($examevent->exam)

                <h3 class="text-center"> <strong>HASIL TES {{ strtoupper($examevent->exam->exam_category->name)  }}</strong> </h3>
                
                @else

                <h3 class="text-center"> <strong>HASIL TES {{ strtoupper($type[$examevent->type])  }}</strong> </h3>

                @endif

                <div class="my-2 row">

                    <ul class="list-group list-group-flush col-md-4">
                        <li class="list-group-item">Nama: <strong>{{ $examevent->user->name }}</strong></li>
                        <li class="list-group-item">Tanggal: <strong>{{ date('d-m-Y', strtotime($examevent->created_at))  }}</strong></li>
                        <li class="list-group-item">No Ujian: <strong>#{{ $examevent->id }}</strong></li>                      
                    </ul>

                </div>

                {{-- <h4>Data Tes Sikap Kerja</h4> --}}

                <h4 class="text-center"> SKOR ANDA</h4>
                <h3 class="text-center h3 d-block my-2"> 
                    <span class="border py-2 px-4 border-primary text-success" style="font-size:36px;">{{ $examevent->nilai }}</span> 
                </h3>

                {{-- Table 1 --}}                 
               

                @if($examevent->type == 'Akademik')

                {{-- hasil psikotes Akademik --}}
                <div class="table-responsive mt-3">

                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr> 
                                <th class="text-center">Soal</th>                             
                                <th class="text-center">Jawab</th>
                                <th class="text-center">Benar</th>
                                <th class="text-center">Salah</th>
                            </tr>

                        </thead>

                        <tbody>
                          
                            <tr class="font-weight-bold">
                                @if($examevent->exam)
                                <td class="text-center">{{ $examevent->exam->questions->count() }}</td> 
                                @else
                                <td class="text-center">{{ $examevent->examItems->first()->question->exam->questions->count() }}</td> 
                                @endif

                                <td class="text-center">{{ $examevent->examItems->count() }}</td>                               
                                <th class="text-center">{{ $examevent->benar }}</th>
                                <th class="text-center"> <span>{{ $examevent->salah }}</span> </th>
                            </tr>                          
                        </tbody>


                    </table>

                </div>

                @else

                {{-- hasil tes umum --}}
                <div class="table-responsive mt-3">

                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr> 
                                <th class="text-center">KS</th>                             
                                <th class="text-center">K</th>
                                <th class="text-center">C</th>
                                <th class="text-center">B</th>
                            </tr>

                        </thead>

                        <tbody>
                            
                            <tr class="font-weight-bold">
                                <td class="text-center">0-49</td> 
                                <td class="text-center">50-60</td>                               
                                <th class="text-center">61-79</th>
                                <th class="text-center"> <span>80-100</span> </th>
                            </tr>                          
                        </tbody>


                    </table>

                </div>

                @endif
                {{-- Akhir table 1 --}}         

                
                

                <div class="card-footer text-center mt-5">
                    <button class="btn btn-primary btn-sm" onclick="printHalaman()">
                        <i class="fas fa-print"></i>
                        Print PDF</button>
                </div>



            </div>

            

            {{-- akhir card --}}
        </div>

    </div>
</div>


@push('scripts')

<script>

    function printHalaman(){
        window.print();
    }

</script>

@endpush


@endsection