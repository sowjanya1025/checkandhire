<div class="mobileNav"> 
    <a href="{{url('/')}}"><span class="glyphicon glyphicon-user"></span><br>Home</a>
    @if(auth::check())
    <a href="{{url('/feedback')}}"><span class="glyphicon glyphicon-star-empty"></span><br>Feedback</a>
    <a href="{{url('/profile')}}"><span class="glyphicon glyphicon-star-empty"></span><br>Profile</a>
    <a href="javascript::void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-star-empty"></span><br>logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    @else
    <a href="{{url('/login')}}"><span class="glyphicon glyphicon-log-in"></span><br>Exist User</a> 
    <a href="{{url('/registration')}}"><span class="glyphicon glyphicon-log-out"></span><br>New User</a> 
    @endif
</div>