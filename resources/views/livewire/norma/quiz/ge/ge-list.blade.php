<div>
    @if($test_id)
    <div class="row justify-content-center">        
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary text-center"><strong>LIST SOAL {{$nama??'NORMA TEST GE - 04'}}</strong></h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-10">
                        <!-- Adjusted column size -->
                        <!-- Your existing content here -->
                    </div>
                    <div class="col-md-2 text-right">
                        <!-- Align to the right -->
                        <a href="#" class="btn btn-primary btn-block margin-bottom" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</a>
                    </div>
                    @if(isset($ge))
                    <div class="pt-3 col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr>
                                        <td>No</td>
                                        <th>Soal</th>                                        
                                        <th>Kunci 1</th>
                                        <td>Kunci 2</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>                                   
                                    @foreach($ge as $row)
                                    <tr>
                                        <td>{{ $row->no }}</td>
                                        <td>{{ $row->quiz }}</td>                                       
                                        <td>{{ $row->k1 }}</td>
                                        <td>{{ $row->k2 }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-lg" wire:click="updateQuizGe({{ $row->id }})"><i class="fa fa-edit"></i> Edit </a>
                                                    <a class="dropdown-item" href="#" onclick="confirm('Confirm Delete Norma GE id {{$row->id}}? \nDeleted Exams cannot be recovered!')||event.stopImmediatePropagation()" wire:click="deleteQuizGe({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach                                        
                                </tbody>
                            </table>
                            {{$ge->links()}} 
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>        
    </div>
    @endif
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        @livewire('norma.quiz.ge.ge-show') 
    </div>
</div>