@extends('dashboard.layouts.app')
@section('style')
    
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">blogs List</h5>
      <a href="{{url('dashboard/blogs/add')}}" style="float: right; margin-top:-30px" class="btn btn-primary">Add blog</a>

      <!-- Table with stripped rows -->
      @if(session('success'))

       <div class="alert alert-success">
          {{session('success')}}

       </div>

      @endif
      <table class="table table-striped">
        <thead>
         
              
          
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            
            <th scope="col">Image</th>
            <th>Tags</th>
            <th scope="col">Author</th>
            <th scope="col">Author description</th>
            <th scope="col">Created_at</th>
            <th scope="col">Actions</th>
          
            
          </tr>
          
        </thead>
        <tbody>
            
          @foreach ($blogs as $blog)
         
          <tr>
            <th scope="row">{{$blog->id}}</th>
            <td>{{$blog->title}}</td>
           
            <td><img src="{{asset($blog->image)}}" alt="" width="75" height="75"></td>
            <td>{{$blog->tags}}</td>
            <td>{{$blog->Author}}</td>
            <td>{{$blog->Author_des}}</td>
            <td>{{$blog->created_at}}</td>
            
            <td>
              <a href="{{url('dashboard/blogs/edit/'.$blog->id)}}" class="btn btn-primary btn-sm">Edit</a>
              <form action="{{ route('destory.blogs', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    DELETE
                </button>
            </form>
              {{-- <a href="{{url('dashboard/blogs/delete/'.$blog->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}

              
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
      {{-- {{$blogs->links()}} --}}
      <!-- End Table with stripped rows -->

    </div>
  </div>
@endsection

@section('script')
    
@endsection




  

    

  



