@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card">
            <div class="card-title px-4 pt-4">

                <h5 class="modal-title" id="createDataModalLabel">Buat Page Baru</h5>

            </div>

            <div class="card-body">
      
                <form method="post" action="{{ route('posts.update', $post->id) }}">
                    @csrf
                    @method('put')
                        <input type="hidden" name="id" value="{{ $post->id }}">

                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Judul" value="{{ $post->title }}">@error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug/Url</label>
                            <input name="slug" type="text" class="form-control" id="slug" placeholder="Slug" value="{{ $post->slug }}">@error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>         
        
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control"  name="body" id="ckeditor" cols="30" rows="10">{{ $post->body }}</textarea>
                        
                            @error('body') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Kategori</label>                
        
                            <select class="form-control" id="" name="category_id" >
                                <option value="">Select Category</option>
                                @foreach($categories as $row)
                                <option value="{{ $row->id }}" 
                                    {{ ($post->category_id == $row->id)?"selected":"" }}
                                    >{{ $row->category }}</option>
                                @endforeach
        
                            </select>
                            
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror        
        
                        </div>
        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="" name="status">
                                <option value="Publish" {{ ($post->status == "Publish")?"selected":"" }}>Publish</option>
                                <option value="Draft" {{ ($post->status == "Draft")?"selected":"" }}>Draft</option>
                            </select>
                            
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        
                        </div>
        
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary close-modal">Save</button>
            
            
                </form>

            </div>
            
        </div>

      



    </div>     
</div>   

@endsection

