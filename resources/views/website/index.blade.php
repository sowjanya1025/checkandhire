@extends('website.layout.default')
@section('content')
<div class="row">
    <div class="ipSerchForm pad100">
      <h3 class="ipH3Head">Search Candidate</h3>
      <input type="text" id="name" class="inInputs col-xs-12 col-md-6 col-sm-6 col-lg-6" placeholder="Name">
      <input type="text" id="pan" class="inInputs" placeholder="PAN Number">
      <input type="text" id="aadhaar" class="inInputs" placeholder="Aadhaar Number">
      <input type="text" id="mobile" class="inInputs" placeholder="Mobile Number">
      <button type="submit" value="Search" class="inInputs ipBtnS search-btn">Search</button>
    </div>
</div>
<div class="row">
    <div class="ipSerchForm pad100">
        <h3 class="ipH3Head">Result found</h3>
        <div class="containerIps">
            <div class="row">
                <div class="employee-list">
                    <h4 style="text-align: center;color: red;">No Result Search Yet!</h4></div>
            </div>
        </div>
    </div>
</div>


    
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
