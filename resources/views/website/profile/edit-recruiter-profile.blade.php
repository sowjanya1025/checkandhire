@extends('website.layout.default')
@section('title', 'My Profile')
@section('content')
 <div class="row">
    <div class="ipSerchForm pad100">
       <div class="row">
            <div class="col-md-3">
                <span class="ipH3Head hrProf" style="font-size:25px">Points = {{auth()->user()->consume}}</span>
            </div>      
            <div class="col-md-9 text-right">
                <a href="{{url('contribute')}}" class="btn btn-primary btn-sm ml-auto" >Contribute History</a>
                <a href="{{url('consume')}}" class="btn btn-primary btn-sm ml-auto">Consume History</a>  
            </div>
        </div>
      <div class="containerIps">
        <form action="{{url('update-my-profile')}}" method="post" enctype="multipart/form-data">
            @csrf            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12"> 
                            <img id="preview" src="{{$data->image}}" class="img-responsive">
                            <input type="file" name="image" id="image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <input type="email" name="email" class="inInputs" placeholder="Email" value="{{$data->email}}" >
                        </div>
                        @foreach($user_col as $col)
                        
                        @if($col != 'image' && $col != 'id'  && $col != 'email' && $col != 'role' && $col != 'password' && $col != 'is_verified' && $col != 'status' && $col != 'is_active' && $col != 'verification' && $col != 'otp' && $col != 'forgot_token' && $col != 'is_active' && $col != 'email_verified_at' && $col != 'remember_token' && $col != 'contribute' && $col != 'consume' && $col != 'created_at' && $col != 'updated_at')
                            @if($col == 'image')
                            <div class="col-xs-12 col-md-6"> <img id="preview" src="{{asset('images/dummy1.png')}}" class="img-responsive"><br>
                                <input type="file" name="image" id="image" class="profileImg">
                            </div>
@elseif($col == 'aadhar_document' || $col == 'pancard_document')
<div class="col-xs-12 col-md-6">
    <input type="file" name="{{ $col }}" class="inInputs">

    @if(!empty($data->$col))
        <!-- Show current file name in textbox -->
        <input type="text" class="inInputs mt-2" value="{{ $data->$col }}" readonly>

        @php
            $filePath = asset('images/recruiter/documents/' . $data->$col);
        @endphp

        <!-- Show preview if image -->
         <!-- 
        @if(Str::endsWith(strtolower($data->$col), ['jpg','jpeg','png']))
            <a href="{{ $filePath }}" target="_blank">
                <img src="{{ $filePath }}" alt="{{ $col }}" width="100" class="mt-2">
            </a>
        @else --
            <!-- Otherwise show download/view link -->
             <!-- 
            <a href="{{ $filePath }}" target="_blank" class="btn btn-sm btn-info mt-2">
                View {{ ucfirst(str_replace('_', ' ', $col)) }}
            </a>
        @endif -->
    @endif

    <i>(Upload {{ ucfirst(str_replace('_', ' ', $col)) }})</i>
</div>
                            @else
                            <div class="col-xs-12 col-md-6">
                                <input type="@if($col == 'email') email @else text @endif" name="{{$col}}" class="inInputs" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{$data->$col}}" >
                            </div>
                            @endif
                        @endif
                        @endforeach
                        <div class="col-xs-12 col-md-6">
                            <input type="password" name="password" class="inInputs" placeholder="Password" value="">
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <input type="password" name="password_confirmation" class="inInputs" placeholder="Confirm Password" value="">
                        </div>
                        <small class="col-md-12">If you don't want to update password then leave the password fields blank.</small>
                        <div class="col-md-12">
                            <input type="submit" value="Update Profile" class="inInputs ipBtnS">
                        </div>
                    </div>
                </div>
             </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
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
@endsection