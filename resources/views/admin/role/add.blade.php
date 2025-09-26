@extends('admin.layout.default')

@section('title', 'Add Role')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>jsGrid</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">jsGrid</li>
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
                        <form action="{{route('role.create')}}" method="post">
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">First Name</label>
                                <input type="text" name="name" class="col-md-8 text-left form-control" id="" placeholder="First Name" value="{{old('name')}}">
                                @error('name')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>                                                                                                       
                            <div class="row my-2">
                                <div class="col-md-4 text-md-right"><label for="">Give Role</label></div>
                                <div class="col-md-8">                                                                 
                                @foreach($permission as $permission)
                                  <input id="{{$permission->name}}" name="permissions[]" type="checkbox" value="{{$permission->id}}">
                                  <label for="{{$permission->name}}" class="permission_name">{{$permission->name}}</label><br>
                                @endforeach
                                </div>
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