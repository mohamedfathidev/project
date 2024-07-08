@extends('layouts.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@endsection

@section('content')
<!-- Detail Start -->
<div class="container py-5">
    <div class="row pt-5">
        <div class="col-lg-8">
            <div class="d-flex flex-column text-left mb-3">
                <p class="section-title pr-5"><span class="pr-2">Blog Detail Page</span></p>
                <h1 class="mb-3">{{$blog->title}}</h1>
                <div class="d-flex">
                    <p class="mr-3"><i class="fa fa-user text-primary"></i> {{$blog->Author}}</p>
                    
                </div>
            </div>
            <div class="mb-5">
                <img class="img-fluid rounded w-100 mb-4" src="{{asset($blog->image)}}" style="height:400px;width:600px;object-fit:cover" alt="Image">
                {!! $blog->description !!}
            </div>

            

          
        </div>

        <div class="col-lg-4 mt-5 mt-lg-0">
            <!-- Author Bio -->
            <div class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4">
                <img src="{{asset($blog->image)}}" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                <h3 class="text-secondary mb-3">{{$blog->Author}}</h3>
                <p class="text-white m-0">{{$blog->Author_des}}</p>
            </div>

           

           

            <!-- Tag Cloud -->
            <div class="mb-5">
                
                <h2 class="mb-4">Tag Cloud</h2>
                @foreach($tags as $tag)
                <div class="d-flex flex-wrap m-n1">
                    <a href="" class="btn btn-outline-primary m-1">{{$tag}}</a>
                    
                </div>
                @endforeach
            </div>

           
        </div>
    </div>
</div>
<!-- Detail End -->
    
@endsection


@section('script')
@endsection
