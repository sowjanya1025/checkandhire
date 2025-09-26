@extends('job.layout.default')
@section('title', 'Feedback Title')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
 <div class="card-body">
   <div class="container">
       <div class="row" style="border-bottom:1px solid lightgrey;margin-bottom:20px">
           <div class='col-md-6'>
               <p style="font-weight:bold">Feedback Title</p>                           
           </div>
           <div class="col-md-6">
           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" style="position:absolute;right:0;">Add</button>
           </div>
        </div>
    </div>
    <table id="datatablesSimple" class="table table-bordered">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Action</th>                                
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
            <tr>
                <td>{{1+$key++}}</td>
                <td>{{$item->title}}</td>
                <td>
                    <a href="" class="btn btn-success btn-sm edit-btn" data-id="{{$item->id}}" data-title="{{$item->title}}" data-toggle="modal" data-target="#editModal">Edit</a>
                    <a href="{{url('delete-feedback-title', [$item->id])}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
                
            </tr>
            @endforeach                        
        </tbody>
    </table>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Add Title</p>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                    <!--    <span aria-hidden="true">&times;</span>-->
                    <!--</button>-->
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{url('create-feedback-title')}}" method="post">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="table" value="employee">
                                    <div class="col-md-4 mb-1 text-md-right">
                                        <label class="input-label" for="">Title</label>
                                    </div>
                                    <div class="col-md-8 mb-1">
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                    </div>                
                                </div>       
                            </div>
                            <div class="col-md-12 text-right mt-2">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Add Title</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>  
    
    
    
      <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">Edit Title</p>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                    <!--    <span aria-hidden="true">&times;</span>-->
                    <!--</button>-->
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{url('update-feedback-title')}}" method="post">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="table" value="employee">
                                    <div class="col-md-4 mb-1 text-md-right">
                                        <label class="input-label" for="">Title</label>
                                    </div>
                                    <div class="col-md-8 mb-1">
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                                        <input type="hidden" id="request_id" name="id">
                                    </div>                
                                </div>       
                                <div class="col-md-12 text-right mt-2">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Update Title</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>  
    

    

    
    <script>
    $(document).ready(function(){
         $('.edit-btn').on('click', function(){
            $('#request_id').val($(this).data('id'));
            $('#title').val($(this).data('title'));
        });
    });
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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