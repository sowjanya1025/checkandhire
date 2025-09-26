@extends('admin.layout.default')

@section('title', 'Edit User')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
                <div class="ml-auto">
                  <a href="{{route('role.add')}}" class="btn btn-success">Role</a>
                  <a href="{{route('role.add')}}" class="btn btn-success">Permission</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">                                
                <div class="row">
                    <div class="col-md-6 offset-md-3">
    <h1><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h1>
    <hr>

    {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'post')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="row my-1">
        {{ Form::label('first_name', 'First Name', array('class' => 'col-md-4 text-md-right')) }}
        {{ Form::text('first_name', null, array('class' => 'col-md-8 form-control')) }}
    </div>
    @error('first_name')
        <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
    @enderror
    <div class="row my-1">
        {{ Form::label('last_name', 'Last Name', array('class' => 'col-md-4 text-md-right')) }}
        {{ Form::text('last_name', null, array('class' => 'col-md-8 form-control')) }}
    </div>
    @error('last_name')
        <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
    @enderror
    <div class="row my-1">    
        <label class="col-md-4 text-md-right" for="">Gender</label>
        <div class="col-md-8 gender">
            <input type="checkbox" name="gender" id="male" class="" value="male" @php if($user->gender == 'male')echo "checked";@endphp><label class="male" for="male">Male</label>
            <input type="checkbox" name="gender" id="female" class="ml-1" value="female" @php if($user->gender == 'female')echo "checked";@endphp><label class="female" for="female">Female</label>
            <input type="checkbox" name="gender" id="other" class="ml-1" value="other" @php if($user->gender == 'other')echo "checked";@endphp><label class="other" for="other">Other</label>
        </div>      
        @error('gender')
        <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
        @enderror                          
    </div>
    <div class="row my-1">
        {{ Form::label('email', 'Email', array('class' => 'col-md-4 text-md-right')) }}
        {{ Form::email('email', null, array('class' => 'col-md-8 form-control')) }}
        @error('email')
        <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="row my-2">
        <label class="col-md-4 text-md-right" for="">Phone Number</label>
        <input type="text" name="phone_number" class="col-md-8 text-left form-control" id="" placeholder="123-123-1234" value="{{old('phone_number') ?? $user->phone_number}}">
        @error('phone_number')
          <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
        @enderror          
    </div>                  
    <div class="row my-1">
        {{ Form::label('location', 'Location', array('class' => 'col-md-4 text-md-right')) }}
        {{ Form::text('location', null, array('class' => 'col-md-8 form-control')) }}
        @error('location')
        <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
    @enderror
    </div>
    <div class="row my-1">    
        <label class="col-md-4 text-md-right" for="">Verification</label>
        <div class="col-md-8 gender">
            <select name="verification" id="verification" class="form-control" id="">              
              <option @if($user->verification == 2)selected='selected'@endif value="2">Verified</option>
              <option @if($user->verification == 3)selected='selected'@endif value="3">Not Verified</option>
            </select>
        </div>                               
    </div>
    <div class='row'>
        <div class="col-md-4 text-md-right"><label for="">Give Role</label></div>
        <div class="col-md-8">                                                                 
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id, $user->roles) }}
                {{ Form::label($role->name, ucfirst($role->name), array('class'=>'col-md-8 role_name')) }}<br>
            @endforeach
        </div>        
    </div>

    <div class="row my-1">
        {{ Form::label('password', 'Password', array('class' => 'col-md-4 text-md-right')) }}
        {{ Form::password('password', array('class' => 'col-md-8 form-control')) }}
    </div>
    @error('password')
        <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
    @enderror

    <div class="row my-1">
        {{ Form::label('password', 'Confirm Password', array('class' => 'col-md-4 text-md-right')) }}
        {{ Form::password('password_confirmation', array('class' => 'col-md-8 form-control')) }}
    </div>
    @error('password')
        <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
    @enderror    
    <div class="row my-1">
        <div class="col-md-8 offset-md-4 p-0">
            {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
        </div>
    </div>    
    {{ Form::close() }}
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