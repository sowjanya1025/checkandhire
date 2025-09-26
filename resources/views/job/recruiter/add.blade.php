@extends('job.layout.default')
@section('title', 'Add Recruiter')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="card-body">
   <div class="container">
       <div class="row" style="border-bottom:1px solid lightgrey;margin-bottom:20px">
           <div class='col-md-6'>
               <p style="font-weight:bold">Add Recruiter</p>                           
           </div>
        </div>
        <div class="col-md-10 offset-md-1">
            <form action="{{url('create-recruiter')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-3 offset-md-3 mb-2">
                    <img id="preview" src="{{asset('images/dummy1.png')}}" class="img-thumbnail" style="width:100%;height:auto">
                    <input type="file" id="image" name="image" class="">
                </div>
                <div class="col-md-6"></div>
                <label class="col-md-3 mb-1 text-md-right">Email</label>
                <input type="text" name="email" class="form-control col-md-9 mb-1" placeholder="Email " value="{{old('email')}}" required>
                @foreach($reg_column as $col)
                    @if($col != 'image' && $col != 'created_at' && $col != 'id' && $col != 'role' && $col != 'email' && $col != 'password' && $col != 'is_verified' && $col != 'status' && $col != 'is_active' && $col != 'verification' && $col != 'otp' && $col != 'forgot_token' && $col != 'is_active' && $col != 'email_verified_at' && $col != 'remember_token' && $col != 'contribute' && $col != 'consume' && $col != 'updated_at')
                        <label class="col-md-3 mb-1 text-md-right">@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>
                        <input type="text" name="{{$col}}" class="form-control col-md-9 mb-1" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{old($col)}}" required>
                    @endif
                @endforeach
                 <label class="col-md-3 mb-1 text-md-right">Password</label>
                <input type="password" name="password" class="form-control col-md-9 mb-1" placeholder="password " value="" required>
                <label class="col-md-3 mb-1 text-md-right">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control col-md-9 mb-1" placeholder="Confirm Password " value="" required>
                <div class="col-md-9 offset-md-3">
                    <input type="Submit" class="btn btn-primary btn-block" value="Add Recruiter">
                </div>
            </div>
            </form>
        </div>
    </div>
<script>
   //Timer
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    .toolbar{
        text-align:center;
        float:left;
    }
    .input-label{
  font-size: 15px;
  font-weight: bold;
}
input, select{
    font-size:15px!important;
}
</style>
@endsection