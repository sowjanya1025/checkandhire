@extends('admin.layout.default')

@section('title', 'Add User')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('registeredUser.index')}}">Registered User List</a></li>
              <li class="breadcrumb-item active">Add User</li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <div class="search-bar">
                  <input type="text" name="search" id="search" placeholder="Search Here...">
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">                                
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="{{route('registeredUser.create')}}" method="post">
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">First Name</label>
                                <input type="text" name="first_name" class="col-md-8 text-left form-control" id="" placeholder="First Name" value="{{old('first_name')}}">
                                @error('first_name')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>                            
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Last Name</label>
                                <input type="text" name="last_name" class="col-md-8 text-left form-control" id="" placeholder="Last Name" value="{{old('last_name')}}">
                                @error('last_name')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>              
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Gender</label>
                                <div class="col-md-8 gender">
                                    <input type="checkbox" name="gender" id="male" class="" value="male" checked><label class="male" for="male">Male</label>
                                    <input type="checkbox" name="gender" id="female" class="ml-1" value="female"><label class="female" for="female">Female</label>
                                    <input type="checkbox" name="gender" id="other" class="ml-1" value="other"><label class="other" for="other">Other</label>
                                </div>                                
                            </div>
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Email</label>
                                <input type="email" name="email" class="col-md-8 text-left form-control" id="" placeholder="user@gmail.com" value="{{old('email')}}">
                                @error('email')
                                  <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror          
                            </div>                                                          
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Phone Number</label>
                                <input type="text" name="phone_number" class="col-md-8 text-left form-control" id="" placeholder="123-123-1234" value="{{old('phone_number')}}">
                                @error('phone_number')
                                  <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror       
                            </div>          
                            
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Location</label>
                                <input type="text" name="location" class="col-md-8 text-left form-control" id="" placeholder="Your Address" value="{{old('location')}}">
                                @error('location')
                                  <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror       
                            </div>                                      
                            
                            <div class="row my-1">    
                                <label class="col-md-4 text-md-right" for="">Verification</label>
                                <div class="col-md-8 gender">
                                    <select name="verification" id="verification" class="form-control" id="">              
                                      <option value="1">Verified</option>
                                      <option value="0">Not Verified</option>
                                    </select>
                                </div>                               
                            </div>
                            
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Password</label>
                                <input type="password" name="password" class="col-md-8 text-left form-control" id="" placeholder="Password">
                                @error('password')
                                  <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror       
                            </div>                                 
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="col-md-8 text-left form-control" id="" placeholder="Confirm Password">
                                @error('password')
                                  <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror       
                            </div>     
                            
                            <div class="row">
                              <div class="col-md-8 offset-md-4 p-0">
                                <input type="submit" class="btn btn-success">
                              </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection