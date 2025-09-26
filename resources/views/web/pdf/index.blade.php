<title>{{$data->name}}</title>
<img src="{{$data->image ? asset($data->image) : ''}}" style="margin-left:30px;margin-top:30px;width:200px;height:300px">        
<table style="position:absolute;top:20px;left:300px;">
    @foreach($emp_column as $col)
    @if($col != 'id' && $col != 'image' && $col != 'created_at' && $col != 'updated_at')
    <tr style="border-bottom:1px solid black">
        <th style="width:120px;padding:4px;text-align:left;border-bottom:1px solid black">@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach</th>
        <td style="border-bottom:1px solid black">{{$data->$col}}</td>
    </tr>
    @endif
    @endforeach
</table>    

@foreach($feed as $item)
<div style="border:2px solid black;padding:5px;margin:0 0px 10px 0px">
    @foreach($feed_column as $col)
            @if($col != 'id' && $col != 'user_id' && $col != 'created_at' && $col != 'updated_at')
                @if($col == 'title')
                <p style="font-size:20px;font-weight:bold">{{DB::table('feedback_title')->where('id', $item->$col)->first()->title}}</p>
                @elseif($col == 'feedback')
                <p>{{$item->$col}}</p>
                @elseif($col != 'recruiter_id')
                <p><strong>@foreach(explode("_", $col) as $item1){{ucfirst($item1)." "}}@endforeach : </strong>{{$item->$col}}</p>
                @endif
            @endif
    @endforeach
       <p><strong>Date : </strong><i>{{$item->created_at}}</i></p>
</div>
@endforeach
