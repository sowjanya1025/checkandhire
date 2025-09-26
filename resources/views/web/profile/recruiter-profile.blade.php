@extends('web.layout.default')
@section('title', 'My Profile')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="banner" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container-fluid banner-container" data-aos="fade-up">
      <div class="row m-2">
          <div class="col-md-12">
            <h3>My Profile</h3>
          </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
      <div class="container">
          <form action="{{url('update-my-profile')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="row profile-form-container">
            <div class="row mt-5 ">
                <div class="col-md-12">
                    <ul class="consume-contribute-list">
                        <li>Contribute : {{auth()->user()->contribute}}</li>                
                        <li class="ml-3">Consume : {{auth()->user()->consume}}</li>                
                    </ul>
                </div>
                <div class="col-md-6 mt-3">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="example@gmail.com" value="{{$data->email}}" required>
                       @if($errors->has('email'))
                        <p class="error">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                @foreach($user_col as $col)
                    @if($col != 'image' && $col != 'id' && $col != 'role' && $col != 'email' && $col != 'password' && $col != 'is_verified' && $col != 'status' && $col != 'is_active' && $col != 'verification' && $col != 'otp' && $col != 'forgot_token' && $col != 'is_active' && $col != 'email_verified_at' && $col != 'remember_token' && $col != 'contribute' && $col != 'consume' && $col != 'created_at' && $col != 'updated_at')
                        <div class="col-md-6 mt-3">
                            <label>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>
                            <input type="text" name="{{$col}}" class="form-control" placeholder="+911231231234" value="{{$data->$col}}" required>
                               @if($errors->has('phone_number'))
                                <p class="error">{{ $errors->first($col) }}</p>
                            @endif
                        </div>
                    @endif
                @endforeach
                <div class="col-md-6 mt-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="********" >
                       @if($errors->has('password'))
                        <p class="error">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="col-md-6 mt-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="********" >
                       @if($errors->has('password'))
                        <p class="error">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                 <div class="col-md-6 mt-3">
                    <label>Image</label><br>
                    <img id="preview" src="{{$data->image ? $data->image : asset('images/dummy1.png')}}" width="150px" height="auto"><br>
                    <input type="file" name="image" id="image"><br><br>
                       @if($errors->has('image'))
                        <p class="error">{{ $errors->first($col) }}</p>
                    @endif
                </div>
                 <script>
                        // Timer
                    function readURL(input) {
                      if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        
                        reader.onload = function(e) {
                          $('#preview').attr('src', e.target.result);
                        }
                        
                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                      }
                    }
                    $("#image").change(function() {
                      readURL(this);
                    });
                </script>

                <div class="col-md-12 mt-3">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
      </div>
    </section><!-- End Contact Section -->
@endsection