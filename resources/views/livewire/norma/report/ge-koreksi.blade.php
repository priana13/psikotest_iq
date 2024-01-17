<div>
     <div class="modal-content">
        <div class="card-header">
            <h5 class="modal-title" id="createDataModalLabel">Koreksi Esai GE </h5>           
        </div>                
        <div class="modal-body">
            <div class="card-body row">
                <div class="col-md-10">
                    <!-- Adjusted column size -->
                    <!-- Your existing content here -->
                </div>
                
                @if(isset($TestGe))
                <div class="pt-3 col-md-12"> 
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>No</td>
                                    <th>Soal</th>
                                    <th>Kunci </th>                                       
                                    <th>Jawaban</th>
                                    <th>Nilai</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($TestGe as $row)
                                <tr>
                                    <td>{{ $row->no }}</td>
                                    <td>{{ $row->quiz }}</td>
                                    <td>{{ $row->k }}</td>
                                    <td>{{ $row->j }}</td>
                                    <td>
                                        <input type="text" class="col-8 form-control text-center" wire:model="nilai{{$row->no}}" wire:change="updateDatabase({{$row->id}},{{$row->no}})" />
                                    </td>
                                    
                                                                      
                                    
                                    
                                    @endforeach                                        
                            </tbody>
                        </table>
                        {{$TestGe->links()}} 
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>            
        </div>
    </div>
</div>
