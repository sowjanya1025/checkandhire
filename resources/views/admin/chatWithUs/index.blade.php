@extends('admin.layout.default')

@section('title', 'Chat With Us')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chat With Us</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <script>
    
</script>
    <!-- Main content -->
    <section class="content mb-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <div class="search-bar">
                  <input type="text" name="search" id="search" placeholder="Search Here...">
                </div>                
              </div>              
              
                <div class="d-flex">
                    <div class="user-list">
                        <ul class="users">
                            @foreach($user as $user)                                                        
                            <li class="user-card" id="{{$user->id}}">
                              @if($user->unread)                                              
                                <span class="pending badge badge-primary badge-sm badge-circle">{{$user->unread}}</span>
                                @endif
                                <img src="{{asset('images/dummy.jpg')}}" alt="">
                                <p class="id d-none">{{$user->id}}</p>
                                <p class="time"><i class="fa fa-users"></i></p>
                                <p class="name">{{$user->first_name}}</p>
                                <p class="last-message">{{$user->email}}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>                    
                    <div class="message-part">                    
                    
                    </div>                    
                    <input type="hidden" name="hidden_id" value="">
                </div>      
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
