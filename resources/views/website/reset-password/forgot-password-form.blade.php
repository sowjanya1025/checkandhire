@extends('website.layout.default')
@section('content')
  <div class="ipSerchForm pad100">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h3 class="ipH3Head">Forgot Password</h3>
            <form action="{{url('forgot-password')}}" method="post">
            @csrf
            <input type="email" name="email" class="inInputs" placeholder="Email">
            <button type="submit" value="Search" class="inInputs ipBtnS">Send Reset Password Link</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


               