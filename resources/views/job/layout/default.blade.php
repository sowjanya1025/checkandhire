<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title', 'job Portal')</title>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
        <!--<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />-->
        <link href="{!!asset('panel/dist/css/styles.css') !!}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        @include('job.style')
        @include('job.custom-style')
    </head>
    <body class="sb-nav-fixed">    
        @if(session()->get('success'))
        <div class="alert alert-success alert-done" role="alert">
            {{session()->get('success')}}
        </div>
        @endif
        @if(session()->get('failed'))
        <div class="alert alert-success alert-failed" role="alert">
            {{session()->get('failed')}}
        </div>
        @endif
       @include('job.layout.header')
        <div id="layoutSidenav">
            @include('job.layout.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
              
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('panel/dist/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('panel/dist/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('panel/dist/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('panel/dist/js/datatables-simple-demo.js')}}"></script>
        <script>
            $(document).ready(function(){         
                setTimeout(() => {
                    $('.alert-done').fadeOut('slow');
                    $('.alert-failed').fadeOut('slow');
                }, 3000);  
                        $('#mobile, input[name="mobile"], input[name="phone_number"], input[name="Phone_Number"], input[name="Contact_Number"]').on('input',function(){
           if($(this).val().length > 10){
                $(this).val($(this).val().slice(0, 10));
            }
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));                                          
        });
        $('#aadhaar, input[name="aadhaar"]').on('input',function(){
           if($(this).val().length > 12){
                $(this).val($(this).val().slice(0, 12));
            }
        });
        $('#pan, input[name="Pan_Card"]').on('input',function(){
           if($(this).val().length > 10){
                $(this).val($(this).val().slice(0, 10));
            }

        });
            });
        </script>
        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    </body>
</html>
