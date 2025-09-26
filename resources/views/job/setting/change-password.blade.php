@extends('job.layout.default')

@section('title', 'Change Password')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 offset-md-3 p-3">
            <div class="card">             
              <!-- /.card-header -->
              <div class="card-body">                                
                <div class="row">
                    <div class="col-md-12">
                      <form action="{{url('update-password')}}" method="post" enctype="multipart/form-data" >
                        @csrf                                                      
                            <div class="row my-2">                            
                                <input type="password" name="old_password" class="form-control col-md-4" placeholder="Old Password" required>
                                @error('old_password')
                                  <p class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row my-2">                            
                                <input type="password" name="password" class="form-control col-md-4" placeholder="New Password" required>
                                @error('password')
                                  <p class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="row my-2">                            
                                <input type="password" name="password_confirmation" class="form-control col-md-4" placeholder="Confirm Password" required>
                                @error('password')
                                  <p class="text-red col-md-8 offset-md-4 error_message">{{ $message }}</p>
                                @enderror
                            </div>                           
                            <div class="row">                            
                              <button type="submit" class="btn btn-primary btn-sm btn-block">Change Password</button>
                            </div>                                
                            </div>                                                
                        </div>                                  
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
@push('javascript')
<script>
  $(document).ready(function(){
    $('.textarea').summernote()
  });
</script>
@endpush