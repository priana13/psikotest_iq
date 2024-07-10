<div>    
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title px-4 pt-4 text-center">
                        <h5>HASIL INTELEGENCE STRUCTURE TEST</h5>
                    </div>
                    <div class="card-body">                        
                        <p><strong>NO. TEST</strong> : {{isset($userNorma['nomor_test']) ?$userNorma['nomor_test']: ''}}</p>
                        <p><strong>TGL. TEST</strong> : {{isset($userNorma['created_at']) ? \Carbon\Carbon::parse($userNorma['created_at'])->format('Y-m-d') : ''}}</p>
                        <p><strong>NAMA</strong> : {{isset($name) ? $name: ''}}</p>
                        <p><strong>TGL. LAHIR</strong> : {{isset($userNorma['tgl_lahir']) ? \Carbon\Carbon::parse($userNorma['tgl_lahir'])->format('Y-m-d') : ''}}</p>
                        <p><strong>USIA</strong> : {{ isset($userNorma['tgl_lahir']) ? \Carbon\Carbon::parse($userNorma['tgl_lahir'])->age : '' }}</p>
                        <p><strong>INSTANSI / SEKOLAH</strong> : {{isset($userNorma['instansi']) ?$userNorma['instansi']: ''}}</p>
                    </div>
                    <div class="card-body row">                        
                        <div class="pt-3 col-md-12"> 
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead class="thead">
                                        <tr>                                            
                                            <th></th>
                                            <th>SE</th>
                                            <th>WA</th>
                                            <th>AN</th>
                                            <th>GE</th>
                                            <th>RA</th>
                                            <th>ZR</th>
                                            <th>FA</th>
                                            <th>WU</th>
                                            <th>ME</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($normaTest)                               
                                    <tr>                                    
                                        <td>RW</td>
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
                                        <td>SW</td>
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
                                    <tr>                                    
                                        <td>KAT</td>
                                        <td>{{ $kat['se'] }}</td>
                                        <td>{{ $kat['wa'] }}</td>
                                        <td>{{ $kat['an'] }}</td>
                                        <td>{{ $kat['ge'] }}</td>
                                        <td>{{ $kat['ra'] }}</td>
                                        <td>{{ $kat['zr'] }}</td>
                                        <td>{{ $kat['fa'] }}</td>
                                        <td>{{ $kat['wu'] }}</td>
                                        <td>{{ $kat['me'] }}</td> 
                                    </tr>                                    
                                    @endif                              
                                    </tbody>
                                </table>                               
                            </div>
                        </div>
                    </div>   

                    <div class="card-body">                        
                        <p><strong>TOTAL RW</strong> : {{$total_rw}}</p>
                        <p><strong>TOTAL SW</strong> : {{$total_sw}}</p>
                        <p><strong>IQ</strong> : {{$iq}}</p>
                        <p><strong>KATEGORI</strong> : {{$kategori}}</p>
                       
                    </div>
                </div>                            
            </div>
        </div>
    </div>
</div>