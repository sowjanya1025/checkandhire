@extends('admin.layout.default')

@section('title', 'Add deal of the week list')

@section('content')
@include('admin.script')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add deal of the week list</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              
              <li class="breadcrumb-item"><a href="{{route('week.index')}}">Deal of the week list</a></li>
              <li class="breadcrumb-item active">Add Deal</li>
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
                        <form action="{{route('week.create')}}" method="post" id="product_add_form" enctype="multipart/form-data">
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
                                <label class="col-md-4 text-md-right" for="">Drink Name</label>
                                <input type="text" name="name" class="col-md-8 text-left form-control" id="" placeholder="Drink Name" value="{{old('name')}}">
                                @error('name')
                                    <div class="text-red col-md-8 offset-md-4 error_message">Drink name field is required.</div>
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
                                <label class="col-md-4 text-md-right" for="">Special Price</label>
                                <input type="text" name="week_special_price" class="col-md-8 text-left form-control" id="" placeholder="Special Price" value="{{old('week_special_price')}}">                                
                                @error('week_special_price')
                                    <div class="text-red col-md-8 offset-md-4 error_message">Special price is required.</div>
                                @enderror
                            </div>                                                                                         
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Select Pass</label>
                                <select name="valid_for_pass" id="" class="col-md-8 form-control" value="{{old('valid_for_pass')}}">
                                    <option value="0">-- Select Pass--</option>
                                    @foreach($pass as $pass)
                                    <option value="{{$pass->id}}">{{$pass->name}}</option>
                                    @endforeach
                                </select>
                                @error('valid_for_pass')
                                    <div class="text-red col-md-8 offset-md-4 error_message">Select Atleast one Pass</div>
                                @enderror
                            </div>                         
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Status</label>
                                <select name="status" id="" class="col-md-8 form-control">                                    
                                    <option value="1">Available</option>
                                    <option value="0">Unavailable</option>                                    
                                </select>                                
                            </div>                                 
                            <div class="row my-2">
                                <label class="col-md-4 text-md-right" for="">Description of product</label>                                
                                <textarea name="description" class="col-md-8 description-box" id="description" cols="30" rows="5"></textarea>
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
