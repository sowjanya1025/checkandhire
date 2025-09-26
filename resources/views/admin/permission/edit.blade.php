@extends('admin.layout.default')

@section('title', 'Edit Permission')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                  
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">                                
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                    <h1><i class='fa fa-user-plus'></i> Edit {{$permission->name}}</h1>
                    <hr>

    {{ Form::model($permission, array('route' => array('permission.update', $permission->id), 'method' => 'post')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="row my-1">
        {{ Form::label('name', 'Name', array('class' => 'col-md-4 text-md-right')) }}
        {{ Form::text('name', null, array('class' => 'col-md-8 form-control')) }}
    </div>        
    @error('name')
    <div class="col-md-8 offset-md-4 error_message">{{$message}}</div>
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