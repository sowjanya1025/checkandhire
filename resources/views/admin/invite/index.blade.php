@extends('admin.layout.default')

@section('title', 'User List')

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
                <div class="search-bar" >
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Name</th>                                        
                  </tr>
                  </thead>
                  <tbody id="app">
                  @php
                    $n=1;
                  @endphp
                  @foreach($user as $user)
                    <tr >
                        <td>{{$n++}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>
                            <form action="/process" method="post">
                            @csrf
                            <input type="email" name="email" value="{{$user->email}}" hidden>
                            <input type="submit" value="Invite" class="btn btn-primary">
                            </form>
                        </td>                        
                        <td>                            
                        </td>
                    </tr>
                    @endforeach
                  </tbody>                  
                </table>
                <div class="px-2 pb-2">                  
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