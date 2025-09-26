@extends('website.layout.default')
@section('title', 'Otp Verification')
@section('content')
<div class="row">
    <div class="ipSerchForm pad100">
      <h3 class="ipH3Head">Register</h3>
              <form action="{{url('verify-otp')}}" method="post">
                @csrf
              <input type="text" name="otp" class="inInputs" placeholder="Enter OTP">
              <input type="submit"  class="inInputs ipBtnS text-center" value="Register"> 
            </form>      
    </div>
</div>
@endsection