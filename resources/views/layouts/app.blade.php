<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KidKinder - Kindergarten Website </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset("res/img/favicon.ico")}}"rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="{{asset("res/lib/flaticon/font/flaticon.css")}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset("res/lib/owlcarousel/assets/owl.carousel.min.css")}}" rel="stylesheet">
    <link href="{{asset("res/lib/lightbox/css/lightbox.min.css")}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("res/css/style.css")}}" rel="stylesheet">

    @yield('style')
</head>

<body>

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')













 <!-- Back to Top -->
<a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("res/lib/easing/easing.min.js")}}"></script>
<script src="{{asset("res/lib/owlcarousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("res/lib/isotope/isotope.pkgd.min.js")}}"></script>
<script src="{{asset("res/lib/lightbox/js/lightbox.min.js")}}"></script>

    
    

    <!-- Template Javascript -->
<script src="{{asset("res/js/main.js")}}"></script>

@yield('script')
</body>

</html>




