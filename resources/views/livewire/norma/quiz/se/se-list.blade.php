<div>
    @if($test_id)
    <div class="row justify-content-center">        
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary text-center"><strong>LIST SOAL {{$nama??'NORMA TEST SE - 01'}}</strong></h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-10">
                        <!-- Adjusted column size -->
                        <!-- Your existing content here -->
                    </div>
                    <div class="col-md-2 text-right">
                        <!-- Align to the right -->
                        <a href="#" class="btn btn-primary btn-block margin-bottom" data-toggle="modal" data-target="#seModal">+ Tambah</a>
                    </div>
                    @if(isset($se))
                    <div class="pt-3 col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr>
                                        <td>No</td>
                                        <th>Soal</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th>E</th>
                                        <td>Kunci</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($se as $row)
                                    <tr>
                                        <td>{{ $row->no }}</td>
                                        <td>{{ $row->quiz }}</td>
                                        <td>{{ $row->a }}</td>
                                        <td>{{ $row->b }}</td>
                                        <td>{{ $row->c }}</td>
                                        <td>{{ $row->d }}</td>
                                        <td>{{ $row->e }}</td>
                                        <td>{{ $row->k }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#seModal" wire:click="updateQuizSe({{ $row->id }})"><i class="fa fa-edit"></i> Edit </a>
                                                    <a class="dropdown-item" href="#" onclick="confirm('Confirm Delete Norma SE id {{$row->id}}? \nDeleted Exams cannot be recovered!')||event.stopImmediatePropagation()" wire:click="deleteQuizSe({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach                                        
                                </tbody>
                            </table>
                            {{$se->links()}} 
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
    @endif
</div>

<div id="seModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        @livewire('norma.quiz.se.se-show') 
    </div>
</div>

