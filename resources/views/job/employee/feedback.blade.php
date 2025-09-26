@extends('job.layout.default')
@section('title', 'Feedback')
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
           <button type="button" class="btn btn-primary btn-sm add-btn" data-toggle="modal" data-target="#exampleModal" style="position:absolute;right:0;">Add Feedback</button>
           </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12 mb-3">
      <div class="row profile-container">
        <div class="col-md-3 text-center">
            <img src="{{$emp->image ? asset($emp->image) : asset('images/dummy1.png')}}" width="100%" height="auto" alt="">
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-12">
              <strong>EMPLOYEE DETAILS</strong>
            </div>
            @foreach($emp_column as $col)
                @if($col != 'image' && $col != 'id' && $col != 'updated_at' && $col != 'created_at')
                    <div class="col-md-4 employee-description">
                        <p><span>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach : </span>{{$emp->$col}}</p>
                    </div>
                @endif
            @endforeach
          </div> 
        </div>
      </div>
    </div>  

    </div>
      <div class="row feedback-row">
        @foreach($feed as $item)
            <div class="col-md-12 feedback-container">
                @foreach($feed_column as $col)
                @if($col != 'user_id' && $col != 'recruiter_id' && $col != 'id' && $col != 'updated_at' && $col != 'created_at')
                    @if($col == 'title')
                    <h4>{{DB::table('feedback_title')->where('id', $item->$col)->first()->title}}</h4>
                    @elseif($col == 'feedback')
                    <p>{{$item->$col}}</p>
                    @elseif($col == 'positive')
                            @if($item->positive == 1)
                            <img src="{{asset('images/happy.png')}}" width="50px" height="auto">
                            @endif
                        @elseif($col == 'negative')
                            @if($item->negative == 1)
                            <img src="{{asset('images/sad.png')}}" width="50px" height="auto">
                            @endif
                        
                    @else
                    <p><span style="font-size:15px;color:black">@foreach(explode("_", $col) as $data){{ucfirst($data)." "}}@endforeach :</span>{{$item->$col}}</p>
                    @endif
                @endif
                @endforeach
                By <i>-{{DB::table('users')->where('id', $item->recruiter_id)->first()->first_name}} ({{DB::table('users')->where('id', $item->recruiter_id)->first()->company}})</i><br><br>
                <span class="action-text edit-feedback" data-toggle="modal" data-target="#editModal" data-id="{{$item->id}}"><i class="fa fa-edit"></i>Edit</span>&nbsp;
                <a href='{{url("delete-employee-feedback", [$item->id])}}' class="action-text delete-feedback"><i class="fa fa-trash"></i>Delete</a>
                </div>
        @endforeach
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Feedback</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
            <form action="{{url('create-employee-feedback')}}" method="post">
            <div class="row">
                @csrf
                <input type="hidden" name="recruiter_id" value="{{auth()->id()}}">
                <input type="hidden" name="user_id" value="{{Request::segment(2)}}">
                @foreach($feed_column as $col)
                    @if($col != 'positive' && $col != 'negative' && $col != 'id' && $col != 'user_id' && $col != 'recruiter_id' && $col != 'created_at' && $col != 'updated_at')
                        @if($col == 'title')
                        <label>{{ucfirst($col)}}</label>
                        <select name="title" class="form-control" required>
                            <option value="">Select {{ucfirst($col)}}</option>    
                            @foreach($title as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                        @elseif($col == 'feedback')
                        
                        <label>Feedback</label>
                        <textarea name="feedback" class="form-control" rows="10" placeholder="Type feedback" required>{{old('feedback')}}</textarea>
                        @else
                        
                        <label>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>
                        <input type="text" name="{{$col}}" class="form-control" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{old($col)}}" required>
                        @endif
                    @endif
                    @endforeach
                    <div style="margin-top:20px">
                        <label for="positive" style="position:relative"><input type="checkbox" name="positive" id="positive" style="position: absolute;top: -10px;right: -6px;" value="1" checked><img src="{{asset('images/happy.png')}}" width="50px" height="auto"></label>
                        <label for="negative" style="position:relative;margin-left:30px"><input type="checkbox" name="negative" id="negative" style="position: absolute;top: -10px;right: -6px;" value="1"><img src="{{asset('images/sad.png')}}" width="40px" height="auto"></label>   
                    </div>
                </div>     
            </div>       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Feedback</button>
        </div>
        </form>

        </div>
    </div>
    </div>
    
     <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Feedback</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid" id="edit-feedback-form">
            

        </div>
    </div>
    </div>
<script>
    $(document).ready(function(){
        $('.edit-feedback').click(function(){
           var id = $(this).data('id'); 
           var _token = "{{ csrf_token() }}";

           $.ajax({
              url:"{{url('get-feedback-form')}}",
              type: 'post',
              data : {id:id,_token:_token},
              success:function(res){
                  $('#edit-feedback-form').html(res);
              }
           });
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
    })
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
.employee-description p{
    font-size: 14px;
    line-height: 1.4;
    margin: 1px;
}
.employee-description p span{
    font-weight:600;
}
.profile-container{
    box-shadow: 0 0 3px 0 black;
    padding: 17px 0px;
    border-radius: 3px;
    margin:0px;
}
.profile-container-inner{
   box-shadow: 0 0 3px 0 black;
    padding: 20px 0px;
    border-radius: 3px;
    background-color: white;
    margin: auto;
}
@media(max-width:767px){
    .profile-container{
    margin:0px 5px;
    }   
}
.profile-tag{
    color:black!important;
}
.title-text{
    margin-bottom:35px;
}
.title-text span{
    border-bottom:2px solid black;
}
.feedback-row{
    margin: -18px 14px 0px -14px;
}
.feedback-container{
    box-shadow: 0 0 2px 0;
    padding: 10px;
    background-color: white;
    margin: 13px 5px -7px 15px;
}
.feedback-container p{
    font-size:14px;
}
.action-text{
    color:black;
    text-decoration:none;
    cursor:pointer;
}
.action-text::hover{
    color:blue;
    text-decoration:none;

}
</style>
@endsection