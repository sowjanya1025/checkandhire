@extends('website.layout.default')
@section('title', 'Feedback')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<form action="{{url('create-feedback')}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="recruiter_id" value="{{auth()->id()}}">
  <div class="row">
    <div class="ipSerchForm pad100">
      <h3 class="ipH3Head">Candidate Details</h3>
      <div class="containerIps">
        <div class="row">
            @foreach($emp_column as $col)
                @if($col != 'id' && $col != 'user_id' && $col != 'created_at' && $col != 'updated_at')
                    @if($col == 'image')
                    <div class="col-xs-12 col-md-4"> <img id="preview" src="{{asset('images/dummy1.png')}}" class="img-responsive"><br>
                        <input type="file" name="image" id="image" class="profileImg" style="display:none">
                        <label for="image" class="ipBtnS" style="padding: 10px;border-radius: 3px;">Choose Candidate Picture</label>
                    </div>
                    @else
                    <div class="col-xs-12 col-md-4">
                        <input type="@if($col == 'email') email @else text @endif" name="{{$col}}" class="inInputs" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{old($col)}}" >
                    </div>
                    @endif
                @endif
            @endforeach
       </div>
       <div class="row">
           
               <h3 class="ipH3Head">Feedback</h3>
               <label for="positive" style="position:relative"><input type="checkbox" name="positive" id="positive" style="position: absolute;top: -10px;right: -6px;" value="1" checked><img src="{{asset('images/happy.png')}}" width="50px" height="auto"></label>
               <label for="negative" style="position:relative;margin-left:30px"><input type="checkbox" name="negative" id="negative" style="position: absolute;top: -10px;right: -6px;" value="1"><img src="{{asset('images/sad.png')}}" width="40px" height="auto"></label>   
                <div class="col-xs-12 col-md-4"> 
                    @foreach($feed_column as $col)
                    @if($col != 'positive' && $col != 'negative' && $col != 'id' && $col != 'user_id' && $col != 'recruiter_id' && $col != 'created_at' && $col != 'updated_at')
                    @if($col == 'title')
                    @foreach($title as $item)
                       <a href="javascript::void(0)" class="feedAdd">@foreach(explode("_", $item->title) as $item1){{ucfirst($item1)." "}}@endforeach <label class="ml-3" for="id{{$item->id}}"><span>+</span></label></a> 
                       <input hidden type="checkbox" name="title[]" id="id{{$item->id}}" data-id="{{$item->id}}" data-title="{{$item->title}}" class="title-check" value="{{$item->id}}">
                    @endforeach
                </div>
                <div class="col-xs-12 col-md-8">
                    @elseif($col == 'feedback')
                    <div id="feedbacks"></div>
                    @else
                    <input type="@if($col == 'email') email @else text @endif" name="{{$col}}" class="inInputs" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{old($col)}}" required>
                    <!--<label>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>-->
                    <!--<input type="text" name="{{$col}}" class="form-control" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{old($col)}}" required>-->
                    @endif
                    @endif
                    @endforeach
                    <button type="submit" value="Search" class="inInputs ipBtnS">Submit Feedback</button>
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
           $('#positive').click(function(){
              if($(this).prop('checked') == true){
               $('#negative').prop('checked', false);   
              }else{
                  $('#negative').prop('checked', true);   
              } 
           });
             $('#negative').click(function(){
              if($(this).prop('checked') == true){
               $('#positive').prop('checked', false);   
              }else{
                  $('#positive').prop('checked', true);   
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
