@extends('website.layout.default')
@section('title', 'Contact')
@section('content')
<div class="row">
    <div class="ipSerchForm pad100">
      <h3 class="ipH3Head">Contact Us</h3>
      <form action="{{url('contact')}}" method="post">
          @csrf
          <input type="text" name="name" class="inInputs col-xs-12 col-md-6 col-sm-6 col-lg-6" placeholder="Your Name" required>
          <input type="email"  name="email" class="inInputs" placeholder="example@gmail.com" required>
          <input type="number" id="mobile" name="number" class="inInputs" placeholder="1231231234" required>
          <textarea class="form-control" name="message" cols="30" rows="3" placeholder="Message..." required></textarea>
          <button type="submit" value="Search" class="inInputs ipBtnS search-btn">Submit</button>
      </form>
    </div>
</div>



    


@endsection  
