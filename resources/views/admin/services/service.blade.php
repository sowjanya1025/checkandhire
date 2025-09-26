@extends('admin.layout.default')

@section('title', 'Service Reports List')

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
                  <a href="{{url('/service-add')}}" class="btn btn-primary">Add New Report</a>
                </div>
              </div>
              <!-- /.card-header -->
              @if(Session::get('success'))
              <div class="card-body">                                
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>  
                  <strong>{{Session('success')}}</strong>
              </div>    
              @endif            
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Customer Name</th>
                    <th>Model No/Serial No</th>
                    <th>Date</th>
                    <th>Report</th>
                    <th>Operations</th>
                  </tr>
                  </thead>
                  <tbody id="service_table">
                      @foreach($services as $service)
                      <tr>
                        <td>{{$num++}}</td>
                        <td>{{$service->customer_name}}</td>
                        <td>{{$service->model_no}}</td>
                        <td>{{$service->date}}</td>
                        <td><img src="{{asset('img')}}/{{$service->report}}" width="100px"></td>
                        <td>
                          <a href="{{url('service-edit')}}/{{$service->id}}"><i class="fa fa-edit"></i></a>
                          <a href="{{url('delete-service')}}/{{$service->id}}"><i class="fa fa-trash"></i></a> 
                        </td>
                      </tr> 
                      @endforeach                    
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.N</th>
                    <th>Customer Name</th>
                    <th>Model No/Serial No</th>
                    <th>Date</th>
                    <th>Report</th>
                    <th>Operations</th>
                  </tr>
                  </tfoot>
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