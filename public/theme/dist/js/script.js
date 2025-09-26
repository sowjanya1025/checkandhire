$(document).ready(function(){  
  $('input[id="rating"]').on('input', function(){
    if($(this).val() > 5){
      $(this).val('5');      
    }
  });
    $('.gender input[type="checkbox"]').click(function(){
        $(this).siblings().prop('checked', false);
    });
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    // Summernote
      $('#description').summernote();        
});

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


// For Day Special Deal
$(document).ready(function(){  
  $('#isDay').change(function(){
    if($(this).val() == '1'){
    $('.isDay_content').html('<div class="row my-2">'+
    '<label class="col-md-4 text-md-right" for="">Special Price</label>'+
    '<input required type="text" name="day_special_price" class="col-md-8 text-left form-control" id="" placeholder="" value="">'+                                
'</div>'+
'<div class="row my-2">'+
    '<label class="col-md-4 text-md-right" for="">Expiray Date</label>'+
    '<select name="day_expiry_date">'+
    '<option value="+24 hours">Day</option>'+
    '<option >week</option>'+
    '</select>'+
'</div>');
    }else{
      $('.isDay_content').html('');
    }
  });
});  

$(document).ready(function () {
  var SITEURL = "{{url('/')}}";
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  var calendar = $('#calendar').fullCalendar({
      editable: true,
      events: SITEURL + "/fullcalendareventmaster",
      displayEventTime: true,
      editable: true,
      eventRender: function (event, element, view) {
          if (event.allDay === 'true') {
              event.allDay = true;
          } else {
              event.allDay = false;
          }
      },
      selectable: true,
      selectHelper: true,
      select: function (start, end, allDay) {
          var title = prompt('Event Title:');

          if (title) {
              var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
              var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

              $.ajax({
                  url: SITEURL + "/fullcalendareventmaster/create",
                  data: 'title=' + title + '&start=' + start + '&end=' + end,
                  type: "POST",
                  success: function (data) {
                      displayMessage("Added Successfully");
                      $('#calendar').fullCalendar('removeEvents');
                      $('#calendar').fullCalendar('refetchEvents' );
                  }
              });
              calendar.fullCalendar('renderEvent',
                      {
                          title: title,
                          start: start,
                          end: end,
                          allDay: allDay
                      },
              true
                      );
          }
          calendar.fullCalendar('unselect');
      },
       
      eventDrop: function (event, delta) {
                  var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                  var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                  $.ajax({
                      url: SITEURL + '/fullcalendareventmaster/update',
                      data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                      type: "POST",
                      success: function (response) {
                          displayMessage("Updated Successfully");
                      }
                  });
              },
      eventClick: function (event) {
          var deleteMsg = confirm("Do you really want to delete?");
          if (deleteMsg) {
              $.ajax({
                  type: "POST",
                  url: SITEURL + '/fullcalendareventmaster/delete',
                  data: "&id=" + event.id,
                  success: function (response) {
                      if(parseInt(response) > 0) {
                          $('#calendar').fullCalendar('removeEvents', event.id);
                          displayMessage("Deleted Successfully");
                      }
                  }
              });
          }
      }
  });
});

function displayMessage(message) {
  $(".response").css('display','block');
  $(".response").html(""+message+"");
  setInterval(function() { $(".response").fadeOut(); }, 4000);
}

















