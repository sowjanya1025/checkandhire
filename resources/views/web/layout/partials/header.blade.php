 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1><a href="{{url('/')}}">LOGO </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{asset('website/assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>          
        <li class="active"><a href="{{url('/')}}">Home</a></li>
        <li class="active"><a href="{{url('feedback')}}">Feedback</a></li>
          <!--<li class="drop-down"><a href="">Interview Process</a>-->
          <!--  <ul>-->
          <!--    <li><a href="#about">No Show To The Interview</a></li>              -->
          <!--    <li class="drop-down"><a href="#">Deep Drop Dow</a>-->
          <!--      <ul>-->
          <!--        <li><a href="#">Deep Drop Down 1</a></li>-->
          <!--        <li><a href="#">Deep Drop Down 2</a></li>-->
          <!--        <li><a href="#">Deep Drop Down 3</a></li>-->
          <!--        <li><a href="#">Deep Drop Down 4</a></li>-->
          <!--        <li><a href="#">Deep Drop Down 5</a></li>-->
          <!--      </ul>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li>-->
          <!--<li class=""><a href="#">Selection Process</a></li>-->
          <!--<li><a href="#services">Joining Process</a></li>-->
          <!--<li><a href="#services">Post Joining Process</a></li>-->
          @if(auth()->check())
          <li class="drop-down"><a href="">{{auth()->user()->first_name}}</a>
            <ul>
              <li><a href="{{url('profile')}}">Profile</a></li>              
              <li><a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
              </li>              
            </ul>
          </li>                             
          @else
          <li><a href="{{url('sign-in')}}">Login</a></li>                
          <li><a href="{{url('registration')}}">Register</a></li>  
          @endif
        </ul>
      </nav><!-- .nav-menu -->

      <!-- <div class="header-social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div> -->

    </div>
  </header><!-- End Header -->

  </div>
  @endif

  
