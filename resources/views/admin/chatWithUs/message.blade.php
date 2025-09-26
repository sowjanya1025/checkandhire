@foreach($message as $message)
    <div class="@if($message->from == auth()->id()) message2 @else message1 @endif">
        <p>{{$message->message ?? ''}}<br><span class="message-time">{{date("d M,y  h:i", strtotime($message->created_at)) ?? ''}}</span></p>        
    </div>                    
@endforeach    
<div class="input-text">
    <input type="text" placeholder="type the message..." class="message-type">                        
</div>