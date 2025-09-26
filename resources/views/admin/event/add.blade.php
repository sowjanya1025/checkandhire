@extends('admin.layout.default')

@section('title', 'Add Event')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('event.index')}}">Event list</a></li>
              <li class="breadcrumb-item active">Add Event</li>
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
                        <form action="{{route('event.create')}}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <label class="col-md-4 text-md-right" for="">Image</label>
                                <div class="col-md-4">
                                    <img id="preview" src="{{asset('images/dummy.jpg')}}" alt="" width="150px" height="150px"><br>
                                </div>                                
                                <div class="col-md-4 offset-md-4">
                                    <label for="image" class="upload-btn">Upload Image</label>
                                </div>                                
                                <input type="file" name="image" id="image" class="form-control" hidden value="{{old('image')}}">                                
                                @error('image')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>                                          
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Event Title</label>
                                <input type="text" name="title" class="col-md-8 text-left form-control" id="" placeholder="Event Title" value="{{old('title')}}">
                                @error('title')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>     
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Location</label>
                                <input type="text" name="location" class="col-md-8 text-left form-control" id="" placeholder="Location" value="{{old('location')}}">
                                @error('location')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>     
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Rating</label>
                                <input type="text" name="rating" id=rating class="col-md-8 text-left form-control" id="" placeholder="1 To 5" value="{{old('rating')}}">                                
                                @error('rating')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>   
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Description of Event</label>                                
                                <textarea name="description" class="col-md-8 description-box" cols="30" rows="10">{{old('description')}}</textarea>
                                @error('description')
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