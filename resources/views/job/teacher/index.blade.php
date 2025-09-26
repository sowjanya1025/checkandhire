@extends('shiksha.layout.default')
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
               <p style="font-weight:bold">Teacher List</p>                           
           </div>
           <div class="col-md-6">
           <button type="button" class="btn btn-primary btn-sm add-btn" data-toggle="modal" data-target="#exampleModal" style="position:absolute;right:0;">Add</button>
           </div>
        </div>
    </div>
    <table id="datatablesSimple" class="table table-bordered">
        <thead>
            <tr>
                <th>S.N</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>City</th>
                <th>Organization / School</th>                                            
                <th>Class</th>
                <th>Action</th>                                
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
            <tr>
                <td>{{1+$key++}}</td>
                <td class="fname">{{$item->first_name}}</td>
                <td class="lname">{{$item->last_name}}</td>
                <td class="gender">{{$item->gender}}</td>
                <td class="email">{{$item->email}}</td>
                <td class="phone">{{$item->phone_number}}</td>
                <td class="city">{{$item->city}}</td>
                <td class="organization_name" data-id="{{$item->organization_id}}">{{DB::table('users')->where('id', $item->organization_id)->first()->organization_name}}</td>                
                <td class="class">{{$item->class}}</td>
                <td>
                    <a href="" class="btn btn-success btn-sm edit-btn" data-id="{{$item->id}}" data-toggle="modal" data-target="#editModal">Edit</a>
                    <a href="{{url('delete-teacher', [$item->id])}}" class="btn btn-danger btn-sm">Delete</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
            <form action="{{url('create-teacher')}}" method="post">
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
                @if(auth()->id() == '1')
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Organization / School</label>
                </div>
                <div class="col-md-9 mb-1">
                    <select name="organization_id" id="" class="form-control" required>
                        <option value="">Select Organization / School</option>
                        @foreach($organization as $item)
                        <option value="{{$item->id}}">{{$item->organization_name}}</option>        
                        @endforeach                
                    </select>
                </div>                  
                @endif                                   
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
            <form action="{{url('update-teacher')}}" method="post">
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
                @if(auth()->id() == '1')
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Organization / School</label>
                </div>
                <div class="col-md-9 mb-1">
                    <select name="organization_id" id="organization_name" class="form-control " required>
                        <option value="">Select Organization / School</option>
                        @foreach($organization as $item)
                        <option value="{{$item->id}}">{{$item->organization_name}}</option>        
                        @endforeach                
                    </select>
                </div>                  
                @endif                                   
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