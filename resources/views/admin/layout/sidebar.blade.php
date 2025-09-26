<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('/images/logo.jpg')}}" class="sidebar-logo" style="    position: absolute;
    width: 100px;
    height: auto;
    top: 0px;
    left: -10px;">
      <span class="brand-text font-weight-light" style="color: black;
    font-size: 19px!important;
    font-weight: bold;
    margin-left: 81px;
    font-family: fantasy;">Happy Hour Club</span>      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/dummy.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->first_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> -->
          @if(auth()->user()->verification == '10')
          <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="fa fa-tachometer-alt mr-3"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="fa fa-glass-martini mr-3"></i>
              <p>
                Feed
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>                           
            </ul>
          </li>   
          <li class="nav-item has-treeview">          
          <a href="" class="nav-link">  
              <i class="fa fa-id-card mr-3"></i>              
              <p>
                Pass/Deal
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">2</span> -->
              </p>            
              </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pass.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pass</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('day.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deal Of Day</p>
                </a>
              </li>                 
              <li class="nav-item">
                <a href="{{route('week.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deal Of Week</p>
                </a>
              </li>                           
            </ul>
          </li>   
      
          <li class="nav-item">
            <a href="{{route('event.index')}}" class="nav-link">
              <i class="fas fa-tasks mr-3"></i>
              <p>
                Event
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('res.index')}}" class="nav-link">
              <i class="fas fa-building mr-3"></i>
              <p>
                Restraunt
              </p>
            </a>
          </li>
          <!--@can('feed')-->
          <!--<li class="nav-item">-->
          <!--  <a href="" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Feed-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--@endcan-->
          <!--<li class="nav-item">-->
          <!--  <a href="invite" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Invite User-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Happy Hour Schedule-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Earning -->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Pass / Deals-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Events-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Payments-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Reports-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>-->
          <!--      Notification-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->

        
          <li class="nav-item">
            <a href="{{route('registeredUser.index')}}" class="nav-link">
              <i class="fa fa-registered mr-3"></i>
              <p>
                Registered Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('feed.index')}}" class="nav-link">
              <i class="fa fa-plus mr-3"></i>
              <p>
                Feeds
              </p>
            </a>
          </li>
          @can('user')
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
              <i class="fa fa-user mr-3"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endcan
          @can('permission')
          <li class="nav-item">
            <a href="{{route('permission.index')}}" class="nav-link">
              <i class="fa fa-universal-access mr-3"></i>
              <p>
                Permission
              </p>
            </a>
          </li>
          @endcan
          @can('role')
          <li class="nav-item">
            <a href="{{route('role.index')}}" class="nav-link">
              <i class="fa fa-user-tag mr-3"></i>
              <p>
                Role
              </p>
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a href="{{route('premium')}}" class="nav-link">
              <i class="fa fa-credit-card mr-3"></i>
              <p>
                Premium Account
              </p>
            </a>
          </li>        
          <li class="nav-item">
            <a href="{{route('setting.index')}}" class="nav-link">
              <i class="fa fa-cogs mr-3"></i>
              <p>
                Setting
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{route('chat.index')}}" class="nav-link">
              <i class="fa fa-cogs mr-3"></i>
              <p>
                Chat
              </p>
            </a>
          </li>        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>