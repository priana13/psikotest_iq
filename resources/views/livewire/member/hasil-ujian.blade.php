@extends('layouts.admin_full')

@section('main-content')


<div class="container">
    <div class="row">

        <div class="col-md-10 m-auto">

            <div class="card bg-white shadow p-3">

                <h3 class="text-center">HASIL TES SIKAP KERJA</h3>

                <div class="my-2">

                    USER: <strong>{{ $ujian->user->name }}</strong> <br>
                    TANGGAL: <strong>{{ date('d-m-Y', strtotime($ujian->created_at))  }}</strong> 
                    
                </div>

                <h4>Data Tes Sikap Kerja</h4>

                {{-- Table 1 --}}

                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead class="bg-warning">
                            <tr>

                                <th></th>
                                <th>Kol 1</th>
                                <th>Kol 2</th>
                                <th>Kol 3</th>
                                <th>Kol 4</th>
                                <th>Kol 5</th>
                                <th>Kol 6</th>
                                <th>Kol 7</th>
                                <th>Kol 8</th>
                                <th>Kol 9</th>
                                <th>Kol 10</th>
                                <th></th>

                            </tr>

                        </thead>

                        <tbody>
                            <tr>
                                <td>BENAR</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                                <th>300</th>
                            </tr>
                            <tr>
                                <td>SALAH</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                                <th>100</th>
                            </tr>
                            <tr>
                                <th colspan="11" style="text-align: center;"> <span>Nilai Rata-rata</span> </th>
                                <th>300</th>
                            </tr>
                        </tbody>


                    </table>

                </div>

                {{-- Akhir table 1 --}}


                {{-- Table 2 --}}

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
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>                                                             
                            </tr>
                           
                        </tbody>


                    </table>

                </div>

                {{-- Akhir table 2 --}}



            </div>
        </div>

    </div>
</div>


@endsection