  <div class="row">
          <div class="navbar-header"> 
            <a class="ipNavbar-brand" href="{{url('/')}}" style="font-size:24px!important">Candidate<span>feedback</span></a> </div>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" style="margin-right:5px"></span>Home</a></li>
              <li><a href="{{url('/contact')}}"><span class="glyphicon glyphicon-phone" style="margin-right:5px"></span>Contact Us</a></li>
              @if(Auth::check())
              <li><a href="{{url('/feedback')}}"><span class="glyphicon glyphicon-pencil" style="margin-right:5px"></span>Leave Feedback</a></li>
              <li><a href="{{url('/profile')}}"><span class="glyphicon glyphicon-user" style="margin-right:5px"></span>Profile</a></li>
              <li><a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();" ><span class="glyphicon glyphicon-log-out" style="margin-right:5px"></span>Logout</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
              </li>
              @else
              <li><a href="{{url('/login')}}"><span class="glyphicon glyphicon-log-in" style="margin-right:5px"></span> Exist User</a></li>
              <li><a href="{{url('/registration')}}"><span class="glyphicon glyphicon-log-in" style="margin-right:5px"></span> New User</a></li>
              @endif
            </ul>
        </div>