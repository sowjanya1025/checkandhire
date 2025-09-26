@extends('job.layout.default')
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
               <p style="font-weight:bold">Employee Table Column List</p>                           
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
                <th>Column Name</th>
                <th>Action</th>                                
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
             @if($item != 'id' && $item != 'user_id' && $item != 'created_at' && $item != 'updated_at')
            <tr>
                <td>{{1+$key++}}</td>
                <td>@foreach(explode("_", $item) as $item){{ucfirst($item)." "}}@endforeach</td>
                <td>
                    <a href="" class="btn btn-success btn-sm edit-btn" data-id="{{$item}}" data-toggle="modal" data-target="#editModal">Edit</a>
                    <a href="{{url('delete-recruiter', [$item])}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
                
            </tr>
            @endif
            @endforeach                        
        </tbody>
    </table>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Column</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
            <form action="{{url('create-employee-column')}}" method="post">
            <div class="row">
                @csrf
                <input type="hidden" name="table" value="employee">
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Column Name</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="column_name" class="form-control" placeholder="Column Name">
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
    

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Organization</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
            <form action="{{url('update-recruiter')}}" method="post">
            <div class="row">
                @csrf
                <input type="hidden" name="id" id="request_id">
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Organization Name</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="organization_name" id="organization_name" class="form-control" placeholder="XYZ Publc School">
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Contact Number</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="+91-1231231234">
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Email</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Password</label>
                </div>
                <div class="col-md-9 mb-2">
                    <input type="password" name="password" class="form-control" placeholder="***********">
                    <small style="color:grey">Leave the password field blank if you don't want to update.</small>
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">City</label>
                </div>
                <div class="col-md-9 mb-1">
                    <input type="text" name="city" id="city" class="form-control" placeholder="Mumbai, Delhi">
                </div>                
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Select Type Of Organization</label>
                </div>
                <div class="col-md-9 mb-1">
                    <select name="type_of_organization" id="type_of_organization" class="form-control">
                    <option value="Primary">Primary</option>
                    <option value="High">High</option>
                    <option value="Higher Secondary">Higher Secondary</option>
                </select>
                </div>                                    
                <div class="col-md-3 mb-1 text-md-right">
                    <label class="input-label" for="">Small Note On School</label>
                </div>
                <div class="col-md-9 mb-1">
                    <textarea name="note" id="note" class="form-control" rows="3" placeholder="About Organization"></textarea>
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

     $('.edit-btn').on('click', function(){
        $('#request_id').val($(this).data('id'));
        alert($(this).closest('tr').children('.org_name').html());
        $('#organization_name').val($(this).closest('tr').children('.org_name').html());
        $('#phone_number').val($(this).closest('tr').children('.phone').html());
        $('#email').val($(this).closest('tr').children('.ema').html());
        $('#city').val($(this).closest('tr').children('.cit').html());        
        $('#note').val($(this).closest('tr').children('.not').html());
        var value = $(this).closest('tr').children('.t_o_o').html();
        $('#type_of_organization option[value="'+value+'"]').attr('selected', 'selected');
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