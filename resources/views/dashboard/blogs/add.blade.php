@extends('dashboard.layouts.app')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Blog</h5>

      <!-- Vertical Form -->
      @if(session()->has('success'))
            <div class="alert alert-success">
                        {{ session('success') }}
            </div>
      @endif
      
      <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="inputNanme4" required value="{{old('title')}}">
          @error('title') <span class="error" style="color: red">{{$message}}</span> @enderror
        </div>
        <div class="col-12">
          <label for="inputEmail4" class="form-label">image</label>
          <input type="file" name="image" class="form-control" id="inputEmail4" >
          @error('image') <span class="error" style="color: red">{{$message}}</span> @enderror
        </div>
        <div class="col-12">
          <label for="inputPassword4" class="form-label">Description</label>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Blog Description</h5>

              <!-- TinyMCE Editor -->
              <textarea name="description"  class="tinymce-editor" required>
                
              </textarea><!-- End TinyMCE Editor -->

            </div>
          </div>
          @error('description') <span class="error" style="color: red">{{$message}}</span> @enderror
        </div>
        <div class="col-12">
            <label for="inputNanme4" class="form-label">Tags</label>
            
            <select class="form-control" id="tags" name="tags[]" multiple="multiple">
              <option value="education">education</option>
              <option value="learning">learning</option>
              <option value="AI">AI</option>
              <option value="life style">lifes tyle</option>
              <option value="Study Tips">Study Tips</option>
              <option value="School News">School News</option>
              <option value="IT">IT</option>
              <option value="Tech">Tech</option>
          </select>
          
            @error('tags') <span class="error" style="color: red">{{$message}}</span> @enderror
          </div>
        <div class="col-12">
            <label for="inputNanme4" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" id="inputNanme4" value="{{old('author')}}" required>
            @error('author') <span class="error" style="color: red">{{$message}}</span> @enderror
          </div>
        <div class="col-12">
            <label for="inputNanme4" class="form-label">Author description</label>
            <input type="text" name="author_des" class="form-control" id="inputNanme4" >
            @error('author_des') <span class="error" style="color: red">{{$message}}</span> @enderror
          </div>
        
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          
        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>

@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
  $('#tags').select2({
      placeholder: "Select tags",
      allowClear: true
  });
});
</script>


@endsection




  

    

  



