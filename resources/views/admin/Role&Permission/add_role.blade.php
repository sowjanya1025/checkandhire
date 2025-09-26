@extends('admin.layout.default')
@section('title', 'Service Operations')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add-Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Add Service 
              </h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <form action="{{route('role.create')}}" method="post" enctype="multipart/form-data">            
                  <div class="row">
                      <div class="col-md-4 text-md-right h-100 align-self-center">
                          <label for="" class="">Role Name :</label>
                      </div>
                      <div class="col-md-6 my-1">
                          <input type="text" class="form-control" name="role_name" value="" placeholder="">                                                   
                      </div>
                  </div>         
                  <div class="row">
                    <div class="col">
                      <table class="table">
                          <thead>
                            <th>Module Name</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>                            
                          </thead>
                          <tbody>
                            <tr>
                              <td>Users</td>
                              <td><input type="checkbox" name="user_view" value="user_view"></td>
                              <td><input type="checkbox" name="user_edit" value="user_edit"></td>
                              <td><input type="checkbox" name="user_delete" value="user_delete"></td>
                            </tr>                            
                          </tbody>
                      </table>
                    </div>
                  </div>                     
                  <div class="row">
                      <div class="col-md-6 offset-md-4 my-1">
                          <input type="submit" class="btn btn-primary btn-block" value="Add Report">
                      </div>
                  </div>     
                  @csrf
              </form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection