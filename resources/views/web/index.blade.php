@extends('web.layout.default')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
            <div class="row m-2" style="background: rgba(0,0,0, 0.5);padding: 30px 23px;">
                <div class="col-md-3 my-2">
                  <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                </div>
                <div class="col-md-2 my-2">
                  <input type="text" name="pan" id="pan" placeholder="Enter PAN" class="form-control">
                </div>
                <div class="col-md-2 my-2">
                  <input type="text" name="aadhaar" id="aadhaar" placeholder="Enter Aadhaar" class="form-control">
                </div>
                <div class="col-md-2 my-2">
                  <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile" class="form-control">
                </div>
                <div class="col-md-3 my-2">
                  <span type="" class="btn btn-primary btn-block search-btn">Search</span>
                </div>
            </div>
    </div>
  </section><!-- End Hero -->
<!-- ======= What We Do Section ======= -->
<section id="what-we-do" class="what-we-do">
      <div class="container">
        <div class="title-text text-left d-flex">
          <div style="width:50%"><h3><span>JOB ASPIRANTS</span></h3> </div>
          <div style="width:50%;text-align:right"><h4><a class="see-all" href="{{url('/')}}">See All</a></h4></div>
        </div>
        

        <div class="row justify-space-between employee-list">
            @foreach($employee as $item)
            <div class="col-md-2">
                <div class="profile-container-index">
                    <a href="{{url('employee-profile', [$item->id])}}" class="profile-tag">
                    <img src="{{$item->image ? $item->image : asset('images/dummy1.png')}}">
                    <p class="profile-text-name">{{$item->name}}</p>
                    <p class="profile-text-designation">{{$item->designation}}</p>
                    </a>                
                </div>
            </div>  
          @endforeach
        <div class="col-md-12 mt-3">
                {{$employee->links("pagination::bootstrap-4")}}
          </div>
      </div>
    
    </div>
    </section><!-- End What We Do Section -->
    <script>
    $(document).ready(function(){
        $('.search-btn').click(function(){
            var name = $('#name').val();
            var aadhaar = $('#aadhaar').val();
            var pan = $('#pan').val();
            var mobile = $('#mobile').val();
            if($('#name').val() == '' && $('#aadhaar').val() == '' && $('#pan').val() == '' && $('#mobile').val() == '' ){
              alert('Please fill atleast one field');
            }else{
                $('html, body').animate({scrollTop:470}, 'slow');
                $('.employee-list').html('');
                $('.employee-list').addClass('loader');
                var token = "{{csrf_token()}}";
                $.ajax({
              url : '{{url("get-employee")}}',
              type : "post",
              data : {name:name,aadhaar:aadhaar,pan:pan,mobile:mobile,_token:token},
              success : function(res){
              $('.employee-list').removeClass('loader');
                var value = $('.employee-list').html(res);  
              }
          });
            }
            
        });
    });
</script>

@endsection
