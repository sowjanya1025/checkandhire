@extends('admin.layout.default')

@section('title', 'Deal of the week list')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Deal of the week list</h1>
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
                <a href="{{route('week.add')}}" class="btn btn-success">Add deal of the week</a>
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
                    <th>Image</th>                    
                    <th>Name</th>                                   
                    <th>Valid For Pass</th>                    
                    <th>Featured</th>                    
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody id="myTable">
                  @php
                    $n=1;
                  @endphp
                  @foreach($product as $product)                  
                    <tr>
                        <td>{{$n++}}</td>
                        <td><img src="{{$product->image}}" width="100px" height="100px"></td>
                        <td>{{$product->name}}</td>                        
                        <td>@if(!empty($product->pass->name)){{$product->pass->name}}@endif</td>
                        <td>
                            <span class="badge badge-sm badge-secondary">Price = <del>{{$product->price}}</del></span><br> 
                            <span class="badge badge-sm bg-black">Price = {{$product->week_special_price}}</span><br>                                                        
                            <span class="badge badge-sm bg-green">{{$product->week_expiry_date->diffForHumans()}}</span> <br>                            
                            <span class="badge badge-sm bg-blue">@if($product->available == '1')Available @else Unavailable @endif</span> <br>                            
                        </td>
                        <td>
                            <a href="{{route('week.edit',[$product->id] )}}"><i class="fa fa-edit"></i></a>
                            <a href="{{route('week.delete',[$product->id] )}}"><i class="fa fa-trash"></i></a>
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