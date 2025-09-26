@extends('admin.layout.default')

@section('title', 'Add Pass')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Pass</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('pass.index')}}">Pass List</a></li>
              <li class="breadcrumb-item active">Add Pass</li>
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
              <!-- /.card-header -->
              <div class="card-body">                                
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="{{route('pass.create')}}" method="post" enctype="multipart/form-data">                            
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Name</label>
                                <input type="text" name="name" class="col-md-8 text-left form-control" id="" placeholder="Pass Name">
                                @error('name')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>                 
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Price</label>
                                <input type="text" name="price" class="col-md-8 text-left form-control" id="" placeholder="Pass Price">
                                @error('price')
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