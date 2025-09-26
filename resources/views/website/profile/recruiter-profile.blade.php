@extends('website.layout.default')
@section('title', 'My Profile')
@section('content')
 <div class="row">
    <div class="ipSerchForm pad100">
      <h3 class="ipH3Head hrProf">HR / Recruiter profile<a href="{{url('edit-profile')}}" class="btn btn-primary btn-sm ml-auto edtProBtn">Edit Profile</a></h3>
      <div class="containerIps">
        <div class="row">
          <div class="col-xs-12 col-md-4"> <img src="{{$data->image}}" class="img-responsive"><br>
          </div>
          <div class="col-xs-12 col-md-4">
            <p class="inInputs">Contribute : {{auth()->user()->contribute}}</p>
          </div>
          <div class="col-xs-12 col-md-4">
            <p class="inInputs">Consume : {{auth()->user()->consume}}</p>
          </div>
          @foreach($user_col as $col)
            @if($col != 'image' && $col != 'id' && $col != 'role' && $col != 'password' && $col != 'is_verified' && $col != 'status' && $col != 'is_active' && $col != 'verification' && $col != 'otp' && $col != 'forgot_token' && $col != 'is_active' && $col != 'email_verified_at' && $col != 'remember_token' && $col != 'contribute' && $col != 'consume' && $col != 'created_at' && $col != 'updated_at')
                <div class="col-xs-12 col-md-4">
                    <p class="inInputs">{{$data->$col}}</p>
                </div>
            @endif
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
@endsection