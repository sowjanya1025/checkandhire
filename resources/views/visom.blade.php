@extends('admin.layout.default')

@section('title', 'Deal of the day list')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Deal of the day list</h1>
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
                <div class="row">
                    <div class="col-md-6 offset-md-3 d-flex">
                        <div class="image-container" style="width:50%;margin:10px;background-color:grey;">
                            <img src="https://i.gadgets360cdn.com/products/large/vivo-y50-vivo-db-841x800-1591623983.jpg" width="100%" alt=""><br>
                            
                            <ul class="rating-n" style="list-style-type:none;padding:0;margin:0">
                                <li style="float:left"><i class="fa fa-star"></i></li>
                                <li style="float:left"><i class="fa fa-star"></i></li>
                                <li style="float:left"><i class="fa fa-star"></i></li>
                                <li style="float:left"><i class="fa fa-star"></i></li>
                                <li style="float:left"><i class="fa fa-star"></i></li>
                            </ul><br>
                            <p class="name-n" style='font-family: "Josefin Sans", sans-serif;'>  Name of the product</p>
                            <p class="price-n">500 <del>200</del></p>
                            
                        </div>
                        <div style="width:50%;margin:10px;background-color:grey">
                            <img src="https://i.gadgets360cdn.com/products/large/vivo-y50-vivo-db-841x800-1591623983.jpg" width="100%">
                        </div>
                    </div>
                </div>
                <style>
                @media(min-width:767px){
                    .image-container{
                        position:relative;
                    }
                    .rating-n, .name-n, .price-n{
                        position:absolute;
                    }
                    .rating-n{
                        top:200px;
                        left:-20px
                    }
                    .name-n{
                        top:250px;
                        left:-20px
                    }
                    .price-n{
                        top:200px;
                        right:-20px
                    }
                }
                </style>
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