@extends('website.layout.default')
@section('title', 'Candidate Profile')
@section('content')
<div class="ipSerchForm pad100">
  <h3 class="ipH3Head">Candidate Details</h3>
  <div class="containerIps">
     <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12"> 
                    <img id="preview" src="{{$emp->image ? asset($emp->image) : asset('images/dummy1.png')}}" class="img-responsive">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach($emp_column as $col)
                @if($col != 'id' && $col != 'image' &&  $col != 'created_at' && $col != 'updated_at')
                    @if(!empty($emp->$col))
                    <div class="col-xs-12 col-md-6">
                        <p class="inInputs">{{$emp->$col}}</p>
                    </div>
                    @endif
                @endif
                @endforeach
            </div>
        </div>
     </div>
  </div>
</div>


    <div class="ipSerchForm pad100">
      <h3 class="ipH3Head">Feedback</h3>
      <div class="containerIps">
          @foreach($feed as $item)
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="ipProcess">
                    @foreach($feed_column as $col)
                        @if($col != 'user_id' && $col != 'recruiter_id' && $col != 'id' && $col != 'updated_at')
                            @if($col == 'title')
                                <h5>{{DB::table('feedback_title')->where('id', $item->$col)->first()->title}}</h5>
                            @elseif($col == 'feedback')
                                <p style="background: white;padding: 14px;text-align: justify;">{{$item->$col}}</p>
                            @elseif($col == 'created_at')
                            <p><span style="font-size:15px;color:black">Feedback Date :</span>{{date('d-m-Y', strtotime($item->$col))}}</p>
                            @elseif($col == 'positive')
                                @if($item->positive == 1)
                                <img src="{{asset('images/happy.png')}}" width="50px" height="auto">
                                @endif
                            @elseif($col == 'negative')
                                @if($item->negative == 1)
                                <img src="{{asset('images/sad.png')}}" width="50px" height="auto">
                                @endif
                            @else
                                <p><span style="font-size:15px;color:black">@foreach(explode("_", $col) as $data){{ucfirst($data)." "}}@endforeach :</span>{{$item->$col}}</p>
                            @endif
                        @endif
                    @endforeach
                    @php
                    $t = DB::table('users')->where('id', $item->recruiter_id)->first();
                    @endphp
                  
                </div>
            </div>
        </div>
          @endforeach
      </div>
    </div>
@endsection