@extends('dashboard.layouts.app')
@section('style')
    
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit User</h5>

      
      @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
      @endif

      <form class="row g-3" action="" method="POST">
        @csrf
        @method('PUT')
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4" value="{{$user->name}}">
          @error('name') <span class="error" style="color: red">{{$message}}</span> @enderror
        </div>
        <div class="col-12">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="inputEmail4" value="{{$user->email}}">
          @error('email') <span class="error" style="color: red">{{$message}}</span> @enderror
        </div>
        <div class="col-12">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="inputPassword4">
          @error('password') <span class="error" style="color: red">{{$message}}</span> @enderror
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>

@endsection

@section('script')
    
@endsection




  

    

  



