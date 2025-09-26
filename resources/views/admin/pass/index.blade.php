@extends('admin.layout.default')

@section('title', 'Pass List')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pass List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pass List</li>
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
                <a href="{{route('pass.add')}}" class="btn btn-success">Add Pass</a>
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
                    <th>Pass ID</th>                                        
                    <th>Name</th>                    
                    <th>Price</th>                    
                    <th>Pass Creator</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody id="myTable">
                  @php
                    $n=1;
                  @endphp
                  @foreach($pass as $pass)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$pass->id}}</td>
                        <td>{{$pass->name}}</td>                        
                        <td>{{$pass->price}}</td>                        
                        <td>                        
                        {{$pass->user->email}}<br>
                        @foreach($pass->restraunt as $res)
                        {{$res->name}}<br>
                        @endforeach
                        </td>
                        <td>
                            <a href="{{route('pass.edit',[$pass->id] )}}"><i class="fa fa-edit"></i></a>
                            <a href="{{route('pass.delete',[$pass->id] )}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>                  
                </table>                
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