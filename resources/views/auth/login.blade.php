@extends('website.layout.default')
@section('content')
  <div class="ipSerchForm pad100">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <h3 class="ipH3Head">Login</h3>
            <form action="{{url('login')}}" method="post">
            @csrf
            <input type="hidden" name="from" value="web">
            <input type="email" name="email" class="inInputs" placeholder="Email">
            <input type="password" name="password" class="inInputs" placeholder="Password">
            <a href="{{url('forgot-password')}}">Forgot Password?</a>
            <button type="submit" value="Search" class="inInputs ipBtnS">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


                    <!--<form action="{{url('login')}}" method="post">-->
                    <!--    @csrf-->
                    <!--    <input type="hidden" name="from" value="web">-->
                    <!--    <div class="row mt-2 space-between">-->
                    <!--        <div class="col-md-12">-->
                    <!--            <label>Email</label>-->
                    <!--            <input type="text" name="email" class="form-control" placeholder="example@gmail.com">-->
                    <!--        </div>-->
                    <!--        <div class="col-md-12 mt-3">-->
                    <!--            <label>Password</label>-->
                    <!--            <input type="password" name="password" class="form-control" placeholder="********">-->
                    <!--        </div>-->
                    <!--        <div class="col-md-12 mt-3">-->
                    <!--            <input type="submit" class="btn btn-primary btn-block" value="Login">-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</form>-->
               