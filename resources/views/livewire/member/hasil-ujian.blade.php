@extends('layouts.admin_full')

@section('main-content')


<div class="container">
    <div class="row" >

        <div class="col m-auto p-3" style="max-width: 1024px;" id="halaman">

            <div class="card bg-white shadow p-5" >

                <h3 class="text-center"> <strong>HASIL TES SIKAP KERJA</strong> </h3>

                <div class="my-2">

                    <h4 class="uppercase" >Nama: <strong>{{ $examevent->user->name }}</strong> <br></h4>

                    
                    Tanggal: <strong>{{ date('d-m-Y', strtotime($examevent->created_at))  }}</strong> 
                    
                </div>

                {{-- <h4>Data Tes Sikap Kerja</h4> --}}

                {{-- Table 1 --}}

                <div class="table-responsive mt-3">

                    <table class="table table-bordered">
                        <thead class="bg-warning">
                            <tr>    
                                                      
                               
                                <th></th>
                                @foreach ($semua_ujian as $row)
                                    <th>Kol {{ $row["kolom"] }}</th>
                                @endforeach
                                <th></th>

                            </tr>

                        </thead>

                        <tbody>
                            <tr>
                                <?php
                                    $jumlah_terjawab = 0;
                                    $jumlah_salah = 0;
                                  
                                ?>
                                <td>JUMLAH</td>
                                @foreach ($semua_ujian as $row)
                                   
                                    <td>{{ $row["qty"] }}</td>
                                        <?php 
                                            $jumlah_terjawab += $row["qty"];

                                            $kol_benar [$row["kolom"]] =$row["qty"];
                                            $label_benar[] = $row["kolom"];
                                            $value_benar[] = $row["qty"];
                                        ?>
                                @endforeach
                              
                                <th>{{ $jumlah_terjawab }}</th>
                            </tr>
                            <tr>
                                <td>SALAH</td>                                

                                @foreach ($semua_ujian as $row)

                                <?php 

                                $get_data = $kolom['kolom-salah']->where('kolom',$row["kolom"])->first();  
                                
                                if($get_data){

                                    $salah = $kolom['kolom-salah']->where('kolom',$row["kolom"])->first()->qty;
                                }else{
                                    $salah = 0;
                                }

                                ?>

                                    @if($get_data)
                                    <td>{{ $salah }}</td>
                                    @else
                                    <td>0</td>
                                    @endif

                                    <?php 
                                        $jumlah_salah += $salah;
                                    ?>

                                @endforeach

                               
                                <th>{{ $jumlah_salah }}</th>
                            </tr>
                            <tr>
                                <th colspan="{{ $kolom['kolom-benar']->max('kolom') + 1 }}" style="text-align: center;"> <span>Nilai Rata-rata</span> </th>
                                <th>{{ ($jumlah_terjawab - $jumlah_salah) / 10 }}</th>
                            </tr>
                        </tbody>


                    </table>

                </div>

                {{-- Akhir table 1 --}}


                {{-- Table 2 --}}

                <div class="row">
                    <div class="col-md-10">                           

                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <thead class="bg-warning">
                                    <tr>
        
                                        <th>KOLOM</th>

                                        <th>1-2</th>

                                        <th>2-3</th>
                                        <th>3-4</th>
                                        <th>4-5</th>
                                        <th>5-6</th>
                                        <th>6-7</th>
                                        <th>7-8</th>
                                        <th>8-9</th>
                                        <th>9-10</th>      

        
                                    </tr>
        
                                </thead>
        
                                <tbody>                                    
                                   
                                    <tr>
                                        <td>SELISIH</td>
                                        <td>
                                            {{ ( isset($kol_benar[2]) && isset($kol_benar[1]))?
                                             $selisih1 = abs($kol_benar[1] - $kol_benar[2]) :
                                             $selisih1 = 0 }}
                                        </td>
                                        <td>{{ ( isset($kol_benar[2]) && isset($kol_benar[3]) )? 
                                                $selisih2 = abs($kol_benar[2] - $kol_benar[3]): 
                                                $selisih2 = 0 }}
                                        </td>
                                        <td>{{ ( isset($kol_benar[3]) && isset($kol_benar[4]) )?$selisih3 =  abs($kol_benar[3] - $kol_benar[4]): $selisih3 = 0 }}</td>
                                        <td>{{ ( isset($kol_benar[4]) && isset($kol_benar[5]) )? $selisih4 = abs($kol_benar[4] - $kol_benar[5]): $selisih4 = 0 }}</td>
                                        <td>{{ ( isset( $kol_benar[5]) && isset($kol_benar[6]) )? $selisih5 = abs($kol_benar[5] - $kol_benar[6]): $selisih5 = 0 }}</td>
                                        <td>{{ ( isset($kol_benar[6]) && isset($kol_benar[7]) )? $selisih6 = abs($kol_benar[6] - $kol_benar[7]): $selisih6 = 0 }}</td>
                                        <td>{{ ( isset($kol_benar[7]) && isset($kol_benar[8]) )? $selisih7 = abs($kol_benar[7] - $kol_benar[8]): $selisih7 =0 }}</td>
                                        <td>{{ ( isset($kol_benar[8]) && isset($kol_benar[9]) )? $selisih8 =abs($kol_benar[8] - $kol_benar[9]): $selisih8 =0 }}</td>
                                        <td>{{ ( isset($kol_benar[9]) && isset($kol_benar[10]) )? $selisih9 =abs($kol_benar[9] - $kol_benar[10]): $selisih9 =0 }}</td>                                                             
                                    </tr>
                                   
                                </tbody>
        
        
                            </table>
        
                        </div>


                    </div>
                </div>


                {{-- Akhir table 2 --}}              

                <div>

                    <div>
                        <canvas id="myChart" class="card shadow p-2" style="width: 100%;"></canvas>
                    </div>

                    <div class="mt-3">
                        <canvas id="chartKestabilan" class="card shadow"  style="width: 100%;"></canvas>
                    </div>                      

                </div>    
                
                

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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: {!! json_encode($label_benar) !!},
        datasets: [{
          label: 'Nilai',
          data: {!! json_encode($value_benar) !!},
          borderWidth: 3,
          borderColor: "#5BC0F8",
        //   backgroundColor: ["#5BC0F8", "#5BC0F8", "#5BC0F8", "#5BC0F8", "#5BC0F8", "#5BC0F8"],
        }]
      },      
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
            title: {
                display: true,
                text: 'GRAFIK KETAHANAN'
            }
        }
      }
    });
  </script>

{{-- Grafik Kestabilan --}}
<script>
    const ctx2 = document.getElementById('chartKestabilan');
  
    new Chart(ctx2, {
      type: 'line',
      data: {
        labels: ['1-2', '2-3', '3-4', '4-5', '5-6', '6-7','7-8','8-9','9-10'],
        datasets: [{
          label: 'Nilai',
          data: [
            {{$selisih1}}, 
            {{$selisih2}},
            {{$selisih3}},
            {{$selisih4}},
            {{$selisih5}},
            {{$selisih6}},
            {{$selisih7}},
            {{$selisih8}},
            {{$selisih9}}           
        ],
          borderWidth: 2,
          borderColor: "#0081C9",
          backgroundColor: ["#0081C9", "#0081C9", "#0081C9", "#0081C9", "#0081C9", "#0081C9"],
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
            title: {
                display: true,
                text: 'GRAFIK KESTABILAN'
            }
        }
      }
    });


    function printHalaman(){

        window.print();

    }
  </script>



@endpush


@endsection