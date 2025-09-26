@extends('admin.layout.default')

@section('title', 'Edit Restaurant')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Restaurant</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('res.index')}}">Restaurant List</a></li>
              <li class="breadcrumb-item active">Edit Restaurant</li>
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
                        <form action="{{route('res.update')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$res->id}}">
                            <div class="row">
                                <label class="col-md-4 text-md-right" for="">Image</label>
                                <div class="col-md-4">
                                    <img id="preview" src="@if(empty($res->image)){{asset('images/dummy.jpg')}}@else {{$res->image}}@endif" alt="" width="150px" height="150px"><br>
                                </div>                                
                                <div class="col-md-4 offset-md-4">
                                    <label for="image" class="upload-btn">Upload Image</label>
                                </div>                                
                                <input type="file" name="image" id="image" class="form-control" hidden>                                
                                @error('image')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Name</label>
                                <input type="text" name="name" class="col-md-8 text-left form-control" id="" placeholder="Restaurant Name" value="{{$res->name}}">
                                @error('name')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>           
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Name</label>
                                <input type="text" name="address" class="col-md-8 text-left form-control" id="" placeholder="Restaurant Address" value="{{$res->address}}">
                                @error('address')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>           
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Latitude</label>
                                <input type="text" name="latitude" class="col-md-8 text-left form-control" id="" placeholder="Latitude" value="{{$res->latitude}}">
                                @error('latitude')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>           
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Longitude</label>
                                <input type="text" name="longitude" class="col-md-8 text-left form-control" id="" placeholder="Longitude" value="{{$res->longitude}}">
                                @error('longitude')
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