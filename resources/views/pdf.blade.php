
<table width="100%">
<tr>
<th>Firs Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Location</th>
</tr>
@foreach($data as $data)
<tr>
<th style="border:1px solid black;paddinf:10px;background-color:green">{{$data->first_name}}</th>
<th style="border:1px solid black;paddinf:10pxbackground-color:red">{{$data->last_name}}</th>
<th style="border:1px solid black;paddinf:10pxbackground-color:blue">{{$data->email}}</th>
<th style="border:1px solid black;paddinf:10px;background-color:yellow">{{$data->phone}}</th>
<th style="border:1px solid black;paddinf:10px;background-color:pink">{{$data->location}}</th>
</tr>
@endforeach
</table>
