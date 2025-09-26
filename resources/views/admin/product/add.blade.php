@extends('admin.layout.default')

@section('title', 'Add Product')

@section('content')
@include('admin.script')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product list</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                        <form action="{{route('product.create')}}" method="post" id="product_add_form" enctype="multipart/form-data">
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
                                <label class="col-md-4 text-md-right" for="">Category</label>
                                <select name="category_id" id="" class="col-md-8 form-control" value="{{old('category_id')}}">
                                    <option value="0">-- Select Category--</option>
                                    @foreach($category as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>                
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Drink Name</label>
                                <input type="text" name="name" class="col-md-8 text-left form-control" id="" placeholder="Drink Name" value="{{old('name')}}">
                                @error('name')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>     
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Price</label>
                                <input type="text" name="price" class="col-md-8 text-left form-control" id="" placeholder="Price" value="{{old('price')}}">
                                @error('price')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>     
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Restaurant</label>
                                <select name="res_id" id="" class="col-md-8 form-control" value="{{old('res_id')}}">
                                    <option value="0">-- Select Restraunt--</option>
                                    @foreach($res as $res)
                                    <option value="{{$res->id}}">{{$res->name}}</option>
                                    @endforeach
                                </select>
                                @error('res_id')
                                    <div class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</div>
                                @enderror
                            </div>                                  
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Description of product</label>                                
                                <textarea name="description" class="col-md-8 description-box" id="description" cols="30" rows="10"></textarea>
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
