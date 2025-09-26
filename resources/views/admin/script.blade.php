<script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
<script>    
  $(document).ready(function(){
    // $('#product_add_form').on('submit', function(){
        // var Date = $('input[name="day_expiry_date"]').val();                
        // var current_time = new Date().getTime();
         @if(Session::get('time'))                
        alert({{Session::get('time')}});
        @endif
        // if(current_time > end_time){
            
        // }else{
            // alert('noe');
        // }
            
            
        
        
        // var end_time = date("Y-m-d H:i:s", strtotime('+'{{Session::get('day_expiry_date')}}'minutes', strtotime($_SESSION['start_time'])));
    // });
  });
</script>
