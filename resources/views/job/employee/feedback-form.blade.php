<form action="{{url('update-employee-feedback')}}" method="post">
    <div class="row">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        @foreach($feed_column as $col)
            @if($col != 'positive' && $col != 'negative' && $col != 'id' && $col != 'user_id' && $col != 'recruiter_id' && $col != 'created_at' && $col != 'updated_at')
                @if($col == 'title')
                <label>{{ucfirst($col)}}</label>
                <select name="title" class="form-control" required>
                    <option value="">Select {{ucfirst($col)}}</option>    
                    @foreach($title as $t)
                        <option value="{{$t->id}}" @if($data->$col == $t->id) selected @endif>{{$t->title}}</option>
                    @endforeach
                </select>
                @elseif($col == 'feedback')
                <label>Feedback</label>
                <textarea name="feedback" class="form-control" rows="10" placeholder="Type feedback" required>{{$data->$col}}</textarea>
                @else
                
                <label>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</label>
                <input type="text" name="{{$col}}" class="form-control" placeholder="@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach" value="{{$data->$col}}" required>
                @endif
            @endif
            @endforeach
            <div style="margin-top:20px">
                <label for="positive1" style="position:relative">
                    <input type="checkbox" name="positive" id="positive1" style="position: absolute;top: -10px;right: -6px;" value="1" @if($data->positive == 1) checked @endif>
                    <img src="{{asset('images/happy.png')}}" width="50px" height="auto">
                </label>
                <label for="negative1" style="position:relative;margin-left:30px">
                    <input type="checkbox" name="negative" id="negative1" style="position: absolute;top: -10px;right: -6px;" value="1" @if($data->negative == 1) checked @endif>
                    <img src="{{asset('images/sad.png')}}" width="40px" height="auto">
                </label>   
            </div>
        </div>     
    </div>       
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update Feedback</button>
</div>
</form>
<script>
    $(document).ready(function(){
               $('#positive1').click(function(){
              if($(this).prop('checked') == true){
               $('#negative1').prop('checked', false);   
              }else{
                  $('#negative1').prop('checked', true);   
              } 
           });
             $('#negative1').click(function(){
              if($(this).prop('checked') == true){
               $('#positive1').prop('checked', false);   
              }else{
                  $('#positive1').prop('checked', true);   
              } 
           });
    });
</script>
