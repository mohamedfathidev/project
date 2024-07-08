@extends('layouts.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@endsection

@section('content')
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Latest Blog</span></p>
                <h1 class="mb-4">Latest Articles From Blog</h1>
            </div>
            <div class="row pb-3">
                @foreach ($blogs as $blog)
                    
               
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="{{asset($blog->image)}}" style="height:233px;width:100%;object-fit:cover" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">{!! strip_tags(Str::substr($blog->title,0,19))!!}</h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary">  By : </i> {{$blog->Author}}</small>
                                
                                
                            </div>
                            {!! strip_tags(Str::substr($blog->description,0,100))!!}
                            <a href="{{url('blogs/details/'.$blog->id)}}" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12 mb-4">
                    {{$blogs->links('pagination::bootstrap-5')}}
                </div>
            </div>






            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection


@section('script')
@endsection
