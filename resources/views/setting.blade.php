<!DOCTYPE html>
<html lang="en">
<head>
  <title>Term And Condition</title>
  <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/gif" sizes="16x16">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>  
<div class="container">
  <div class="row">
      <div class="col-md-4"></div>
    <div class="col-md-4">
        <img src="{{asset('images/logo.jpg')}}" width="100%" height="auto" alt="">
    </div>
  </div>
  <div class="row">
      <div class="col">      
        {!!htmlspecialchars_decode($setting->setting)!!} 
          
      </div>
  </div>
</div>

</body>
</html>
