<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title', 'Job Portal')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
@include('web.web-style')

  <!-- Favicons -->
  <link href="{{asset('website/assets/img/favicon1.png')}}" rel="icon">
  <link href="{{asset('website/assets/img/apple-touch-icon1.png')}}" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('website/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/vendor/owl.carousel/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('website/assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  @include('web.style')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
      $(document).ready(function(){
        setTimeout(function(){ 
            $('.success-alert').fadeOut('slow');
            $('.failed-alert').fadeOut('slow');
         }, 4000);
      });
  </script>
  <!-- =======================================================
  * Template Name: Lumia - v2.2.1
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 @include('web.layout.partials.header')
 <div class="alert alert-primary" role="alert">
  Success ALert
  </div>
  
  @if(session()->get('failed'))
  <div class="alert alert-primary failed-alert" role="alert">
    {{session()->get('failed')}}

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

@include('web.layout.partials.footer')
