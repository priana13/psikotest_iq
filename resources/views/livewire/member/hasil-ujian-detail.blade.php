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
                <p class="text-center">No Ujian: <strong>#{{ $examevent->id }}</strong></p>

                <div class="my-2 row">

                    <div class="col-sm-6">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama: <strong>{{ $examevent->user->name }}</strong></li>                                                       
                            <li class="list-group-item">Skor/Nilai: <strong>{{ $examevent->nilai }}</strong></li>                 
                        </ul>

                    </div>

                    <div class="col-sm-6">

                        <ul class="list-group list-group-flush">                            
                            <li class="list-group-item text-right">Tanggal: <strong>{{ date('d-m-Y', strtotime($examevent->created_at))  }}</strong></li>                           
                                         
                        </ul>
                        
                    </div>                   

                </div>                                        
               

                @if($examevent->type == 'Akademik')

                <div class="row">
                    {{-- kolom 1 --}}
                    <div class="col-sm-4 mt-3">

                        <table class="table mx-1">
                          <tr>
                              <th>No</th>
                              <th>Jawab</th>
                              <th>Ket</th>
                          </tr>
      
                          @foreach ($questions[0] as $item)                         
      
                          <tr>
                              <td>{{ $item->no }}</td>
                              <td>

                                {{ (isset($jawaban[$item->id])) ? $jawaban[$item->id] : '-' }}
                                    
                                </td>
                              <td>
                                @if(isset($is_true[$item->id]))

                                    {{ ($is_true[$item->id])? 'Benar' : "Salah" }}
                                
                                @else 
                                    Tidak Terjawab
                                @endif
                              </td>
                          </tr>
      
                          @endforeach                   
      
                        </table>                        
      
                      </div>   

                      {{-- kolom 2 --}}
                      <div class="col-sm-4 mt-3">

                        <table class="table mx-1">
                          <tr>
                              <th>No</th>
                              <th>Jawab</th>
                              <th>Ket</th>
                          </tr>
      
                          @foreach ($questions[1] as $item)                         
      
                          <tr>
                              <td>{{ $item->no }}</td>
                              <td>

                                {{ (isset($jawaban[$item->id])) ? $jawaban[$item->id] : '-' }}
                                    
                                </td>
                              <td>
                                @if(isset($is_true[$item->id]))

                                    {{ ($is_true[$item->id])? 'Benar' : "Salah" }}
                                
                                @else 
                                    Tidak Terjawab
                                @endif
                              </td>
                          </tr>
      
                          @endforeach                
      
                        </table>                        
      
                      </div>   

                      {{-- kolom 3 --}}
                      <div class="col-sm-4 mt-3">

                        <table class="table mx-1">
                          <tr>
                              <th>No</th>
                              <th>Jawab</th>
                              <th>Ket</th>
                          </tr>
      
                          @foreach ($questions[2] as $item)                         
      
                          <tr>
                              <td>{{ $item->no }}</td>
                              <td>

                                {{ (isset($jawaban[$item->id])) ? $jawaban[$item->id] : '-' }}
                                    
                                </td>
                              <td>
                                @if(isset($is_true[$item->id]))

                                    {{ ($is_true[$item->id])? 'Benar' : "Salah" }}
                                
                                @else 
                                    Tidak Terjawab
                                @endif
                              </td>
                          </tr>
      
                          @endforeach                  
      
                        </table>                        
      
                      </div>   

                </div>
              

                <a href="{{ route('member.hasil_ujian_umum', $examevent->id) }}" class="btn btn-secondary mx-auto mt-3"> << Kembali</a>

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