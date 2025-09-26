@extends('website.layout.default')
@section('title', 'Registration')
@section('content')
<div class="row">
    <div class="ipSerchForm pad100">
      <h3 class="ipH3Head">Register</h3>
        <form action="{{url('registration')}}" method="post">
            @csrf
          <input type="email" name="email" class="inInputs" placeholder="E-mail">
          @error('email')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="password" name="password" class="inInputs" placeholder="Password">
          <input type="password" name="password_confirmation" class="inInputs" placeholder="Confirm Password">
          @error('password')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="submit"  class="inInputs ipBtnS text-center" value="Register"> 
        </form>      
    </div>
</div>
       
        <!--<form action="{{url('registration')}}" method="post">-->
        <!--    @csrf-->
        <!--    <div class="row mt-5 ">-->
        <!--        <div class="col-md-6">-->
        <!--            <label>Email</label>-->
        <!--            <input type="text" name="email" class="form-control" placeholder="example@gmail.com" value="{{old('email')}}" required>-->
        <!--               @if($errors->has('email'))-->
        <!--                <p class="error">{{ $errors->first('email') }}</p>-->
        <!--            @endif-->
        <!--        </div>-->
        <!--        <div class="col-md-6 mt-3">-->
        <!--            <label>Password</label>-->
        <!--            <input type="password" name="password" class="form-control" placeholder="********" required>-->
        <!--               @if($errors->has('password'))-->
        <!--                <p class="error">{{ $errors->first('password') }}</p>-->
        <!--            @endif-->
        <!--        </div>-->
        <!--        <div class="col-md-6 mt-3">-->
        <!--            <label>Confirm Password</label>-->
        <!--            <input type="password" name="password_confirmation" class="form-control" placeholder="********" required>-->
        <!--               @if($errors->has('password'))-->
        <!--                <p class="error">{{ $errors->first('password') }}</p>-->
        <!--            @endif-->
        <!--        </div>-->
        <!--        @foreach($user_col as $col)-->
        <!--            @if($col != 'image' && $col != 'id' && $col != 'role' && $col != 'email' && $col != 'password' && $col != 'is_verified' && $col != 'status' && $col != 'is_active' && $col != 'verification' && $col != 'otp' && $col != 'forgot_token' && $col != 'is_active' && $col != 'email_verified_at' && $col != 'remember_token' && $col != 'contribute' && $col != 'consume' && $col != 'created_at' && $col != 'updated_at')-->
        <!--                <div class="col-md-6 mt-3">-->
        <!--                    <label>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>-->
        <!--                    <input type="text" name="{{$col}}" class="form-control" placeholder="+911231231234" value="{{old($col)}}" required>-->
        <!--                       @if($errors->has('phone_number'))-->
        <!--                        <p class="error">{{ $errors->first($col) }}</p>-->
        <!--                    @endif-->
        <!--                </div>-->
        <!--            @endif-->
        <!--        @endforeach-->
        <!--         <div class="col-md-6 mt-3">-->
        <!--            <label>Image</label><br>-->
        <!--            <img id="preview" src="{{asset('images/dummy1.png')}}" width="150px" height="auto"><br>-->
        <!--            <input type="file" name="image" id="image"><br><br>-->
        <!--               @if($errors->has('phone_number'))-->
        <!--                <p class="error">{{ $errors->first($col) }}</p>-->
        <!--            @endif-->
        <!--        </div>-->
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

        <!--        <div class="col-md-12 mt-3">-->
        <!--            <input type="submit" class="btn btn-primary">-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</form>-->
@endsection