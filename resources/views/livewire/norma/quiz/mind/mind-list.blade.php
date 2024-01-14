<div>
    @if($test_id)

    <div class="row justify-content-center">       
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary text-center"><strong>LIST SOAL {{$nama??'NORMA TEST ME - HAPALAN'}}</strong></h5>
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
                    @if(isset($mind))
                    <div class="pt-3 col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr>
                                        <td>Jenis</td>                                        
                                        <th>Keterangan</th>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($mind as $row)
                                    <tr>
                                        <td>{{ $row->quiz }}</td>                                        
                                        <td>{{ $row->uraian }}</td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-lg" wire:click="updateQuizMind({{ $row->id }})"><i class="fa fa-edit"></i> Edit </a>
                                                    <a class="dropdown-item" href="#" onclick="confirm('Confirm Delete Norma ME id {{$row->id}}? \nDeleted Exams cannot be recovered!')||event.stopImmediatePropagation()" wire:click="deleteQuizMind({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach
                                        
                                </tbody>
                            </table>
                            {{$mind->links()}}
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
        @livewire('norma.quiz.mind.mind-show') 
    </div>
</div>