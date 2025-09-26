@extends('website.layout.default')
@section('title', 'Feedback')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<form action="{{url('create-feedback')}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="recruiter_id" value="{{auth()->id()}}">
  <div class="row">
    <div class="ipSerchForm pad100">
      <h3 class="ipH3Head">Pay To Find The Best Profile</h3>
      <div class="containerIps">
        <div class="row">
             <div class="col-xs-12 col-md-4">
                <button class="inInputs ipBtnS search-btn">Pay INR 100</button>
            </div>
       </div>
        </div>
    </div>
  </div>
</div>
</form>
 <script>
        $(document).ready(function(){
           $('.title-check').click(function(){
               var id = $(this).data('id');
               var title = $(this).data('title');
             if($(this).prop('checked') == true){
                 $('#feedbacks').prepend('<div class="ipProcess feedlabel'+id+'"><h5>'+title+'</h5><textarea name="feedback'+id+'" class="form-control feedlabel'+id+'" placeholder="Feedback here..." required></textarea></div>');
             }else{
                 $('.feedlabel'+id).remove();
             }  
           });
        });
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
@endsection
