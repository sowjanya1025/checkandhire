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
           <a href="{{url('add-employee')}}" class="btn btn-primary btn-sm add-btn" style="position:absolute;right:0;">Add</a>
           </div>
        </div>
    </div>
    <table id="datatablesSimple" class="table table-bordered">
        <thead>
            <tr>
                @foreach($emp_column as $key => $item)
                @if($item != 'id' && $item != 'updated_at')
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
                @foreach($emp_column as $col)
                @if($col != 'id' && $col != 'updated_at')
                    @if($col == 'created_at')
                    <td>{{date('d, M Y', strtotime($item->$col))}}</td>
                    @elseif($col == 'image')
                    <td><img src="{{$item->image ? $item->image : asset('images/dummy1.png')}}" width="30px" height="auto"</td>
                    @else
                    <td>{{$item->$col}}</td>
                    @endif
                @endif
                @endforeach
                <td class="d-flex" style="border:none">
                    <div style="width:30%"><a href="{{url('view-feedback', [$item->id])}}" class="btn btn-primary btn-sm edit-btn">View</a></div>
                    <div style="width:5%"></div>
                    <div style="width:30%"><a href="{{url('edit-employee', [$item->id])}}" class="btn btn-success btn-sm edit-btn">Edit</a></div>
                    <div style="width:1%"></div>
                    <div style="width:30%"><a href="{{url('delete-employee', [$item->id])}}" class="btn btn-danger btn-sm">Delete</a></div>
                </td>                
            </tr>
            @endforeach                        
        </tbody>
    </table>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
            <form action="{{url('create-student')}}" method="post">
            <div class="row">
                @csrf
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">First Name</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Last Name</label>
                </div>               
                <div class="col-md-9 mb-1">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Gender</label>
                </div>
                <div class="col-md-9 mb-1">
                    <select name="gender" id="" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>                        
                        <option>Other</option>                        
                    </select>
                </div>                     
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Contact Number</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="phone_number" class="form-control duplicate phone-add" placeholder="+91-1231231234" required autocomplete="off">
                    <p class="error-phone" style="display:none;color:red;font-size:14px">Phone Number is already been taken</p>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Email</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="email" name="email" class="form-control duplicate email-add" placeholder="example@gmail.com" required autocomplete="off">
                    <p class="error-email" style="display:none;color:red;font-size:14px">Email is already been taken</p>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Password</label>
                </div>
                <div class="col-md-9 mb-2">
                    <input type="password" name="password" class="form-control" placeholder="***********" required>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">City</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="city" class="form-control" placeholder="Mumbai, Delhi" required>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Organization / School</label>
                </div>
                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Teacher</label>
                </div>
                                             
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Class</label>
                </div>
                <div class="col-md-9 mb-1">
                    <select name="class" id="" class="form-control" required>
                        <option value="">Select Class</option>
                        <option>I</option>
                        <option>II</option>                        
                    </select>
                </div>                                                     
                </div>     
            </div>       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary submit-btn">Save</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
            <form action="{{url('update-student')}}" method="post">
                <input type="hidden" name="request_id" id="request_id">
            <div class="row">
                @csrf
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">First Name</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="first_name" class="form-control" id="fname" placeholder="First Name" required>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Last Name</label>
                </div>               
                <div class="col-md-9 mb-1">
                    <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last Name" required>
                </div>
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Gender</label>
                </div>
                <div class="col-md-9 mb-1">
                    <select name="gender" class="form-control" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>                        
                        <option value="Other">Other</option>                        
                    </select>
                </div>                     
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Contact Number</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="phone_number" class="form-control duplicate phone-add" id="phone" placeholder="+91-1231231234" required autocomplete="off">
                    <p class="error-phone" style="display:none;color:red;font-size:14px">Phone Number is already been taken</p>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Email</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="email" name="email" class="form-control duplicate email-add" id="email" placeholder="example@gmail.com" required autocomplete="off" readonly>
                    <p class="error-email" style="display:none;color:red;font-size:14px">Email is already been taken</p>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Password</label>
                </div>
                <div class="col-md-9 mb-2">
                    <input type="password" name="password" class="form-control" placeholder="***********">
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">City</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="city" class="form-control" id="city" placeholder="Mumbai, Delhi" required>
                </div>                
                                        
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Class</label>
                </div>
                <div class="col-md-9 mb-1">
                    <select name="class" id="class" class="form-control " required>
                        <option value="">Select Class</option>
                        <option>I</option>
                        <option>II</option>                        
                    </select>
                </div>                                                     
                </div>     
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>

        </div>
    </div>
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