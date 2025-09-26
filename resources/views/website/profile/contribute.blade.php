@extends('website.layout.default')
@section('title', 'My Profile')
@section('content')
 <div class="row">
    <div class="ipSerchForm pad100">
      <div class="row">
            <div class="col-md-3">
                <span class="ipH3Head hrProf">Points = {{auth()->user()->consume}}</span>
            </div>      
            <div class="col-md-9 text-right">
                <a href="{{url('profile')}}" class="btn btn-primary btn-sm ml-auto" >Profile</a>
                <a href="{{url('consume')}}" class="btn btn-primary btn-sm ml-auto">Consume History</a>  
            </div>
        </div>
      <div class="containerIps" style="overflow:scroll;padding-left:20px">
        <div class="row">
            <table class="table table-bordered" style="font-size:12px">
                <thead>
                    <tr style="background-color:black;color:white">
                        @foreach($feed_column as $item)
                        @if($item != 'created_at' && $item != 'updated_at' && $item != 'recruiter_id' && $item != 'positive' && $item != 'negative')
                        @if($item == 'user_id')
                        <th>Candidate Name</th>
                        @else
                        <th>{{str_replace('_', ' ', $item)}}</th>
                        @endif
                        @endif
                        @endforeach
                        <th>Positive/Negative</th>
                        <th>Date&nbsp;Of&nbsp;Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        @foreach($feed_column as $value)
                            @if($value != 'positive' && $value != 'negative' && $value != 'created_at' && $value != 'updated_at' && $value != 'recruiter_id')
                                @if($value == 'user_id')
                                <th>
                                    <!--<a href="{{url('see-employee', [$item->$value])}}">-->
                                        {{DB::table('employee')->where('id', $item->$value)->first()->name}}
                                        <!--</a>-->
                                    
                                </th>
                                @elseif($value == 'title')
                                <th>
                                    {{DB::table('feedback_title')->where('id', $item->$value)->first()->title}}
                                </th>
                                @else
                                <th>{{$item->$value}}</th>
                                @endif
                            @endif
                        @endforeach
                                @if(!empty($item->positive))
                                    <th>
                                        Positive
                                    </th>
                                @endif
                                @if(!empty($item->negative))
                                    <th>
                                        Negative
                                    </th>
                                @endif
                            <th>{{date('d-m-Y', strtotime($item->created_at))}}</th>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-12">
                {{$data->links()}}
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <script>
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
  </script>
@endsection