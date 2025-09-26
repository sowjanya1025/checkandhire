@extends('website.layout.default')
@section('content')
  <div class="ipSerchForm pad100">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h3 class="ipH3Head">Reset Password</h3>
            <form action="{{url('reset-password')}}" method="post">
            @csrf
            <input type="hidden" name="forgot_token" value="{{Request::segment(2)}}">
            <input type="password" name="password" class="inInputs" placeholder="Enter New Password">
            <input type="password" name="password_confirmation" class="inInputs" placeholder="Confirm New Password">
              @error('password')
              <p class="text-red col-md-8 offset-md-4 error_message" style="color:red">{{ $message }}</p>
              @enderror  
            <button type="submit" value="Search" class="inInputs ipBtnS">Reset Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


               