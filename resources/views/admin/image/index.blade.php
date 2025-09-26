@extends('admin.layout.default')

@section('title', 'Images')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Image Upload</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Image Upload</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" id="app"> 
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <div class="search-bar" >
                  <input type="text" name="search" id="search" placeholder="Search Here...">
                </div>
                <div class="ml-auto">
                  <a href="{{route('role.add')}}" class="btn btn-success">Role</a>
                  <a href="{{route('permission.add')}}" class="btn btn-success">Permission</a>
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">                                
                    <image-component></image-component>
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