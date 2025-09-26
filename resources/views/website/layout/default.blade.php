<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title', 'Job Portal')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@include('website.style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    // Timer
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#preview').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
$("#image").change(function() {
  readURL(this);
});
</script>
</head>
<body class="ipHomeBack">
<nav class="navbar ipHeader">
  <div class="containerIp">
      @include('website.layout.partials.header')
      @if(session()->get('success'))
      <div class="alert alert-primary" role="alert" style="position: absolute;background: green;top: 51px;right: 25px;color: white;">
      {{session()->get('success')}}
      </div>
      @endif
      
    @if(session()->get('failed'))
      <div class="alert alert-danger" role="alert" style="position: absolute;background: red;top: 51px;right: 25px;color: white;">
      {{session()->get('failed')}}
      </div>
      @endif
        @if(session()->get('failed_array'))
      <div class="alert alert-danger" role="alert" style="position: absolute;background: red;top: 51px;right: 25px;color: white;">
          Following fields are empty in your profile.<br>
          @foreach(session()->get('failed_array') as $item)
            - {{str_replace('_',' ',$item)}}<br>
          @endforeach
      </div>
      @endif
</nav>
</div>
<div class="containerIp">
  @yield('content')
</div>
</div>
@include('website.layout.partials.mobile-header')
</body>
<script>
    $(document).ready(function(){
       setTimeout(function(){ 
        $('.alert').fadeOut('slow');
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
</html>
