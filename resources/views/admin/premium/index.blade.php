@extends('admin.layout.default')

@section('title', 'Purchase Premium Account')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Premium Account</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" style="overflow:hidden!important">                             
              @if(Session::get('message'))
              <div class="card-body">                                
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>  
                  <strong>{{Session('message')}}</strong>
              </div>    
              @endif            
              <div class="row m-3">
                <div class="col-md-12">
                  <ul>
                    <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur dolor dolorum consectetur voluptatem nam esse dolore similique doloremque, expedita distinctio. </p></li>
                    <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur dolor dolorum consectetur voluptatem nam esse dolore similique doloremque, expedita distinctio. </p></li>
                    <li><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur dolor dolorum consectetur voluptatem nam esse dolore similique doloremque, expedita distinctio. </p></li>
                  </ul> 
                </div>                 
                <div class="col-md-4 m-2">
                  <a href="{{route('premium.checkout')}}" class="btn btn-success">Click To Purchase The Premium Accoount</a>
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