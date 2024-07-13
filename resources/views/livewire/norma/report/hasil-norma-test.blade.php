<div >    
    <div class="container">
        <div class="row " >
            <div class="col-md-12">
                <div class="card" style="padding:80px;">
                    <div class="card-title px-4 pt-4 text-center">
                        <h3 class=""> <strong>HASIL INTELEGENCE STRUCTURE TEST</strong> </h3>
                        <h5 class=""> <strong>Arsta Media</strong> </h5>
                    </div>
                    <div class="card-body">  

                        <table>
                            <tr>
                                <td><strong>NO. TEST</strong></td> 
                                <td class="pr-2">:</td> 
                                <td>
                                    {{isset($userNorma['nomor_test']) ?$userNorma['nomor_test']: ''}} 
                                </td>                                
                            </tr>
                            <tr>
                                <td><strong>TGL. TEST</strong></td> <td>:</td> <td> {{isset($userNorma['created_at']) ? \Carbon\Carbon::parse($userNorma['created_at'])->format('d-m-Y') : ''}}</td>
                            </tr>
                            <tr>
                                <td><strong>NAMA</strong></td> <td>:</td> <td>{{isset($name) ? $name: ''}}</td>
                            </tr>
                            <tr>
                                <td><strong>TGL. LAHIR</strong></td> <td>:</td> <td>{{isset($userNorma['tgl_lahir']) ? \Carbon\Carbon::parse($userNorma['tgl_lahir'])->format('d-m-Y') : ''}}</td>
                            </tr>
                            <tr>
                                <td><strong>USIA</strong></td> <td>:</td> <td>{{ isset($userNorma['tgl_lahir']) ? \Carbon\Carbon::parse($userNorma['tgl_lahir'])->age : '' }}</td>
                            </tr>
                            <tr>
                                <td><strong>INSTANSI / SEKOLAH</strong></td> <td>:</td> <td>{{isset($userNorma['instansi']) ?$userNorma['instansi']: ''}}</td>
                            </tr>
                        </table>

                    </div>
                    <div class="card-body row">                        
                        <div class="pt-3 col-md-12"> 
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center">
                                    <thead class="thead">
                                        <tr class="bg-primary text-white">                                            
                                            <th class="width:80px;"></th>
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
                                        <td class="px-3">RW</td>
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
                                        <td class="px-3">SW</td>
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
                                    <tr class="font-weight-bold">                                    
                                        <td class="px-3">KAT</td>
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
                        <table>
                            <tr>
                                <td>TOTAL RW</td> <td class="px-2">:</td> <td>{{$total_rw}}</td>                               
                            </tr>
                            <tr>
                                <td>TOTAL SW</td> <td>:</td> <td>{{$total_sw}}</td>
                            </tr>
                            <tr>
                                <td>IQ</td> <td>:</td> <td> <strong>{{$iq}}</strong> </td>
                            </tr>
                            <tr>
                                <td>TOTAL RW</td> <td>:</td> <td>{{$kategori}}</td>
                            </tr>
                        </table>                
                    
                       
                    </div>
                </div>                            
            </div>
        </div>

        <div class="text-center mt-3">
            <button onclick="window.print()" class="btn-primary btn-sm">Print</button>
        </div>
        
    </div>
</div>