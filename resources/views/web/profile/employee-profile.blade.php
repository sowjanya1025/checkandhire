@extends('web.layout.default')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="banner" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container-fluid banner-container" data-aos="fade-up">
      <div class="row m-2">
          <div class="col-md-12">
        <h3>Employee Profile</h3>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
      <div class="container">
        <div class="title-text">
          <h2><span>Employee Profile</span></h2>          
        </div>
        <div class="row mt-5 justify-content-center profile-container-inner">
          <div class="col-md-4">
              <img src="{{$emp->image ? asset($emp->image) : asset('images/dummy1.png')}}" width="100%" height="auto" alt="">
          </div>
          <div class="col-md-8">
             <div class="row">
                    <div class="col-md-12">
                      <strong>PERSONAL DETAILS</strong>
                    </div>
                       @foreach($emp_column as $col)
                        @if($col != 'id' && $col != 'updated_at' && $col != 'created_at')
                            @if($col != 'image')
                                <div class="col-md-6 employee-description">
                                    <p><span>@foreach(explode("_", $col) as $item){{ucfirst($item)." "}}@endforeach : </span>{{$emp->$col}}</p>
                                </div>
                            @endif
                        @endif
                    @endforeach
                  </div>                               
          </div>
        </div>
        <div class="row">
            @foreach($feed as $item)
            <div class="col-md-12 feedback-container">
                @foreach($feed_column as $col)
                @if($col != 'user_id' && $col != 'recruiter_id' && $col != 'id' && $col != 'updated_at' && $col != 'created_at')
                    @if($col == 'title')
                    <h4>{{DB::table('feedback_title')->where('id', $item->$col)->first()->title}}</h4>
                    @elseif($col == 'feedback')
                    <p>{{$item->$col}}</p>
                    @else
                    <p><span style="font-size:15px;color:black">@foreach(explode("_", $col) as $data){{ucfirst($data)." "}}@endforeach :</span>{{$item->$col}}</p>
                    @endif
                @endif
                @endforeach
                By <i>-{{DB::table('users')->where('id', $item->recruiter_id)->first()->first_name}} ({{DB::table('users')->where('id', $item->recruiter_id)->first()->company}})</i><br><br>
                <!--<span class="action-text edit-feedback" data-toggle="modal" data-target="#editModal" data-id="{{$item->id}}"><i class="fa fa-edit"></i>Edit</span>&nbsp;-->
                <!--<a href='{{url("delete-employee-feedback", [$item->id])}}' class="action-text delete-feedback"><i class="fa fa-trash"></i>Delete</a>-->
            </div>
                @endforeach
        </div>
      </div>
    </section><!-- End Contact Section -->
@endsection