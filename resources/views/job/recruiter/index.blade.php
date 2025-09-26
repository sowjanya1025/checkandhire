@extends('job.layout.default')
@section('title', 'Recruiter / HR List')
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
               <p style="font-weight:bold">Recruiter / HR List</p>                           
           </div>
           <div class="col-md-6">
           <a href="{{url('add-recruiter')}}" class="btn btn-primary btn-sm add-btn" style="position:absolute;right:0;">Add</a>
           </div>
        </div>
    </div>
    <table id="datatablesSimple" class="table table-bordered">
        <thead>
            <tr>
                @foreach($reg_column as $key => $item)
                    @if($item != 'id' && $item != 'role' && $item != 'password' && $item != 'is_verified' && $item != 'status' && $item != 'is_active' && $item != 'verification' && $item != 'otp' && $item != 'forgot_token' && $item != 'is_active' && $item != 'email_verified_at' && $item != 'remember_token' && $item != 'contribute' && $item != 'consume' && $item != 'updated_at')
                        @if($item == 'created_at')
                        <th>Date</th>
                        @else
                        <th>@foreach(explode("_", $item) as $item){{ucfirst($item)." "}}@endforeach</th>
                        @endif
                    @endif
                @endforeach
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
            <tr>
                @foreach($reg_column as $col)
                    @if($col != 'id' && $col != 'role' && $col != 'password' && $col != 'is_verified' && $col != 'status' && $col != 'is_active' && $col != 'verification' && $col != 'otp' && $col != 'forgot_token' && $col != 'is_active' && $col != 'email_verified_at' && $col != 'remember_token' && $col != 'contribute' && $col != 'consume' && $col != 'updated_at')
                        @if($col == 'created_at')
                        <td>{{date('d, M Y', strtotime($item->$col))}}</td>
                        @elseif($col == 'image')
                        <td><img src="{{$item->image ? $item->image : asset('images/dummy1.png')}}" width="50px" height="50px"</td>
                        @else
                        <td>{{$item->$col}}</td>
                        @endif
                    @endif
                @endforeach
                <td class="d-flex" style="border:none">
                    <div style="width:30%"><a href="{{url('edit-recruiter', [$item->id])}}" class="btn btn-success btn-sm edit-btn">Edit</a></div>
                    <div style="width:10%"></div>
                    <div style="width:30%"><a href="{{url('delete-recruiter', [$item->id])}}" class="btn btn-danger btn-sm">Delete</a></div>
                    <div style="width:10%"></div>
                    <div style="width:30%"><a href="{{url('delete-recruiter', [$item->id])}}" class="btn btn-danger btn-sm">Approve</a></div>

                </td>                
            </tr>
            @endforeach                        
        </tbody>
    </table>



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