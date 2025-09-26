<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$data->name}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<img style="margin-left:30px" src="{{$data->image}}" width="200px" height="auto">        

<table style="position:absolute;top:20px;left:300px;">
    @foreach($emp_column as $col)
    @if($col != 'id' && $col != 'image' && $col != 'created_at' && $col != 'updated_at')
    <tr style="border-bottom:1px solid lightgrey">
        <th style="width:200px;padding:4px">{{$col}}</th>
        <td>{{$data->$col}}</td>
    </tr>
    @endif
    @endforeach
</table>    





<hr>


@foreach($feed as $item)
<div style="border:2px solid black;padding:5px;margin:0 0px 10px 0px">
    @foreach($feed_column as $col)
            @if($col != 'id' && $col != 'user_id' && $col != 'created_at' && $col != 'updated_at')
                @if($col == 'title')
                <p style="font-size:20px;font-weight:bold">{{DB::table('feedback_title')->where('id', $item->$col)->first()->title}}</p>
                @elseif($col == 'feedback')
                <p>{{$item->$col}}</p>
                @elseif($col != 'recruiter_id')
                <p>{{$item->$col}}</p>
                @endif
            @endif
    @endforeach
    <p>By :- {{DB::table('users')->where('id', $item->recruiter_id)->first()->first_name}}</p>
</div>
@endforeach
