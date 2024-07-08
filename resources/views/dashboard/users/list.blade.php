@extends('dashboard.layouts.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Users List</h5>
      <a href="{{url('dashboard/users/add')}}" style="float: right; margin-top:-30px" class="btn btn-primary">Add User</a>

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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            
          </tr>
          
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>
              <a href="{{url('dashboard/users/edit/'.$user->id)}}" class="btn btn-primary btn-sm">Edit</a>
              <form action="{{ route('destory.users', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    DELETE
                </button>
            </form>
              {{-- <a href="{{url('dashboard/users/delete/'.$user->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}

              
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
      {{$users->links('pagination::bootstrap-5')}}
      <!-- End Table with stripped rows -->

    </div>
  </div>
@endsection

@section('script')
    
@endsection




  

    

  



