@extends('web.layout.default')
@section('title', 'Add Feedback')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="banner" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container-fluid banner-container" data-aos="fade-up">
      <div class="row m-2">
          <div class="col-md-12">
            <h3>Add Feedback</h3>
          </div>
      </div>
    </div>
  </section><!-- End Hero -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
        <div class="container">
            <form action="{{url('create-feedback')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="recruiter_id" value="{{auth()->id()}}">
            <div class="row">
                <div class="col-md-6 profile-form-container">
                    <h3>Employee Details</h3>
                    @foreach($emp_column as $col)
                    @if($col != 'id' && $col != 'user_id' && $col != 'created_at' && $col != 'updated_at')
                    @if($col == 'image')
                    <img id="preview" src="{{asset('images/dummy1.png')}}" width="150px" height="auto"><br>
                    <input type="file" name="image" id="image"><br><br>
                    @else
                    <label>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>
                    <input type="text" name="{{$col}}" class="form-control" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{old($col)}}" required>
                    @endif
                    @endif
                    @endforeach
                </div>
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

                <div class="col-md-6 profile-form-container">
                    <h3>Feedback</h3>
                    @foreach($feed_column as $col)
                    @if($col != 'id' && $col != 'user_id' && $col != 'recruiter_id' && $col != 'created_at' && $col != 'updated_at')
                        
                        @if($col == 'title')
                        
                        <label>{{ucfirst($col)}}</label><br>
                        
                            @foreach($title as $item)
                                <input type="checkbox" name="title[]" id="id{{$item->id}}" data-id="{{$item->id}}" data-title="{{$item->title}}" class="title-check" value="{{$item->id}}"><label class="ml-3" for="id{{$item->id}}">{{$item->title}}</label><br>
                            @endforeach
                        @elseif($col == 'feedback')
                        <div class="feedback-textarea"></div>
                        @else
                        
                        <label>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>
                        <input type="text" name="{{$col}}" class="form-control" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{old($col)}}" required>
                        @endif
                    @endif
                    @endforeach
                </div>
                <input type="submit" class="btn btn-primary mt-3" value="Submit">
            </div>
            </form>
        </div>
    </section><!-- End Contact Section -->
    <script>
        $(document).ready(function(){
           $('.title-check').click(function(){
               var id = $(this).data('id');
               var title = $(this).data('title');
             if($(this).prop('checked') == true){
                 $('.feedback-textarea').append('<label class="feedback'+id+'">'+title+' Feedback</label><textarea name="feedback'+id+'" class="form-control feedback'+id+'" rows="3" placeholder="Type '+title+' feedback" required></textarea>');
             }else{
                 $('.feedlabel'+id).remove();
             }  
           });
        });
    </script>
@endsection
 