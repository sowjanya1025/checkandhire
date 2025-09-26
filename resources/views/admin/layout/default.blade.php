<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'Happy Hour')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('theme/dist/css/style.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('theme/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('theme/dist/css/adminlte.min.css')}}">
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('theme/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('theme/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <link rel="stylesheet" href="{{asset('theme/plugins/jsgrid/jsgrid.min.css')}}">
  <link rel="stylesheet" href="{{asset('theme/plugins/jsgrid/jsgrid-theme.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">  
    
  <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('theme/dist/css/adminlte.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('theme/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet')}}">

  <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('theme/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">




  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layout.sidebar')

  <div class="content-wrapper">
  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->
  </div>
  <!--<footer class="main-footer">-->
  <!--  <strong>Copyright &copy; 2020-2021 <a href="#">Happy Hours Club</a>.</strong>-->
  <!--  All rights reserved.-->
  <!--  <div class="float-right d-none d-sm-inline-block">-->
  <!--    <b>Version</b> 3.0.5-->
  <!--  </div>-->
  <!--</footer>-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('theme/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('theme/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('theme/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('theme/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('theme/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('theme/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('theme/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('theme/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('theme/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{asset('theme/dist/js/adminlte.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('theme/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('theme/dist/js/demo.js')}}"></script> -->
<!-- <script src="{{asset('theme/dist/js/script.js')}}"></script> -->
<script src="{{asset('theme/dist/js/calendar.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('theme/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('theme/dist/js/demo.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('theme/plugins/summernote/summernote-bs4.min.js')}}"></script>
@stack('DataTableCss')
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@stack('stripe')

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    
$(document).ready(function(){                
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('d72cef1b69742c1f4733', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      // alert(JSON.stringify(data));
      var my_id = "{{auth()->id()}}";
      var reciever_id = $('input[name="hidden_id"]').val();        
      if(my_id == data.from){
        $('#'+data.to).click();
      }else if(my_id == data.to){
        if(reciever_id == data.from){
          $('#'+data.from).click();
        }else{
          var pending = parseInt($('#'+data.from).find('.pending').html());

          if(pending){
            $('#'+data.from).find('.pending').html(pending + 1);
          }else{
            $('#' + data.from).append('<span class="pending badge badge-primary badge-sm badge-circle">1</span>');
          }
        }
      }
    });


  $('.user-card').click(function(e){
    e.preventDefault();        
    $(this).children('.pending').html('');
      var id = $(this).children('.id').html();   
      $(this).css('background-color', 'green');
      $(this).siblings().css('background-color', 'royalblue');
      $('input[name="hidden_id"]').val(id);              
          $.ajax({
            url:"getMessages",
            type:'POST',
            data:{id:id},
            success:function(response){
              $('.message-part').html(response);              
              bottomScroll();
            }
          });                  
          
  });
  $(document).on('keyup', '.input-text input', function(e){    
    if(e.keyCode == 13 && message !='' && reciever_id != ''){      
      var message = $(this).val();
        $(this).val('');                    
        var reciever_id = $('input[name="hidden_id"]').val();        
      $.ajax({
        url:'message',
        type:'post',
        data:{reciever_id:reciever_id, message:message},
        success:function(data){
          
        },
        error: function(jqXHR, status, err){

        },
        complete: function (){
          bottomScroll();
        }
      });
      
    }
  })
});
function bottomScroll(){
  $('.message-part').animate({
    scrollTop:$('.message-part').get(0).scrollHeight
  }, 50);
}
</script>
@stack('DataTableJs')
</body>
</html>
