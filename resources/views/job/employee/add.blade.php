@extends('job.layout.default')
@section('title', 'Employee List')
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
               <p style="font-weight:bold">Employee List</p>                           
           </div>
           <div class="col-md-6">
           <button type="button" class="btn btn-primary btn-sm add-btn" data-toggle="modal" data-target="#exampleModal" style="position:absolute;right:0;">Add</button>
           </div>
        </div>
        <div class="col-md-10 offset-md-1">
            <form action="{{url('create-employee')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">
                @foreach($emp_column as $col)
                    @if($col != 'id' && $col != 'user_id' && $col != 'created_at' && $col != 'updated_at')
                        @if($col == 'image')
                        <div class="col-md-3 offset-md-3 mb-2">
                            <img id="preview" src="{{asset('images/dummy1.png')}}" class="img-thumbnail" style="width:100%;height:auto">
                            <input type="file" id="image" name="image" class="">
                        </div>
                        <div class="col-md-6"></div>
                        @else
                        <label class="col-md-3 mb-1 text-md-right">@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>
                        <input type="text" name="{{$col}}" class="form-control col-md-9 mb-1" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{old($col)}}" required>
                        @endif
                    @endif
                @endforeach
                <div class="col-md-9 offset-md-3">
                    <input type="Submit" class="btn btn-primary btn-block" value="Add Employee">
                </div>
            </div>
            </form>
        </div>
    </div>
<script>
    $(document).ready(function(){   
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}); 
    $('.edit-btn').on('click', function(){        
        $('#request_id').val($(this).data('id'));
        $('#fname').val($(this).closest('tr').children('.fname').html());
        $('#lname').val($(this).closest('tr').children('.lname').html());
        $('#phone').val($(this).closest('tr').children('.phone').html());
        $('#email').val($(this).closest('tr').children('.email').html());
        $('#city').val($(this).closest('tr').children('.city').html());        
        $('#class').val($(this).closest('tr').children('.class').html());        
        $('#class').val($(this).closest('tr').children('.class').html());                
        $('#gender').val($(this).closest('tr').children('.gender').html());
        $('#organization_name').val($(this).closest('tr').children('.organization_name').data('id'));
        $('#teacher_id').val($(this).closest('tr').children('.teacher_id').data('id'));
    });  
    $('.duplicate').on('input', function(){           
       var email = $('.email-add').val();
       var phone = $('.phone-add').val();         
        $.ajax({
            url : "{{url('check-email')}}",
            type : 'post',
            data : {email:email,phone:phone},
            success : function(res){ 
                if(res == 'email'){
                    $('.submit-btn').attr('disabled', true);
                    $('.error-email').css('display', 'block');  
                    $('.error-phone').css('display', 'none');
                  
                }else if(res == 'phone'){
                    $('.submit-btn').attr('disabled', true);
                    $('.error-email').css('display', 'none'); 
                    $('.error-phone').css('display', 'block');                    
                }else{
                    $('.submit-btn').attr('disabled', false);
                    $('.error-phone').css('display', 'none');
                    $('.error-email').css('display', 'none'); 
                }            
            }
        });
    });
});
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