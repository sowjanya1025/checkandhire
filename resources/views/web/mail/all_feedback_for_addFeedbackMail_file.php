
@foreach($ids as $value)
@php 
$feedback = App\Models\Feedback::where('id', $value)->first();
$feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
@endphp
<div style="border:2px solid black;padding:5px;margin:0 0px 10px 0px">
    @foreach($feed_column as $col)
            @if($col != 'id' && $col != 'user_id' && $col != 'created_at' && $col != 'updated_at')
                @if($col == 'title')
                <p style="font-size:20px;font-weight:bold">{{DB::table('feedback_title')->where('id', $feedback->$col)->first()->title}}</p>
                @elseif($col == 'feedback')
                <p>{{$feedback->$col}}</p>
                @endif
            @endif
    @endforeach
</div>
@endforeach
