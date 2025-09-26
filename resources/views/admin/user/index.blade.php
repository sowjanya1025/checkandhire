@extends('admin.layout.default')

@section('title', 'User List')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
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
                <div class="search-bar" >
                  <input type="text" name="search" id="search" placeholder="Search Here...">
                </div>
                <div class="ml-auto">
                  <a href="{{route('role.add')}}" class="btn btn-success">Role</a>
                  <a href="{{route('permission.add')}}" class="btn btn-success">Permission</a>
                </div>
              </div>
              <!-- /.card-header -->
              @if(Session::get('message'))
              <div class="card-body">                                
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>  
                  <strong>{{Session('message')}}</strong>
              </div>    
              @endif            
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Name</th>                    
                    <th>Email</th>                    
                    <th>Role</th>                    
                    <th>Operations</th>
                  </tr>
                  </thead>
                  <tbody id="app">
                  @php
                    $n=1;
                  @endphp
                  @foreach($user as $user)
                    <tr >
                        <td>{{$n++}}</td>
                        <td><a href="" @click.prevent='enterIntoChat({{$user->id}})'>{{$user->first_name}} {{$user->last_name}}@if($user->verification == 2)<i class="fa fa-check-circle ml-2">@endif</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roles()->pluck('name')->implode(' ')}}</td>
                        <td>
                            <a href="{{route('user.edit', [$user->id])}}"><i class="fa fa-edit"></i></a>
                            <a href="{{route('user.delete', [$user->id])}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>                  
                </table>
                <div class="px-2 pb-2">
                  <a href="{{route('user.add')}}" class="btn btn-danger">Add</a>                  
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