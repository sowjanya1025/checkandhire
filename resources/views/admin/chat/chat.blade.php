@extends('admin.layout.default')

@section('title', 'Chat With Us')

@section('content')
<style>
.list-group{
  overflow-y:scroll;
  height:250px;
}
</style>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chat With Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chat With Us</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" >
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <div class="search-bar">
                  <input type="text" name="search" id="search" placeholder="Search Here...">
                </div>                
              </div>
                <div class="row">
                  <div class="col">
                  <div class="px-2 pb-2" id="app">
                    <li class="list-group-item active">Chat Room<span class="badge badge-pill badge-danger">@{{numberOfUsers}}</span></li>     
                    <div class="badge badge-pill badge-primary">@{{ typing }}</div>
                      <ul class="list-group" v-chat-scroll>                        
                        <message 
                        v-for="value, index in chat.message" 
                        :key=value.index 
                        :color=chat.color[index]
                        :user = chat.user[index]
                        :time = chat.time[index]
                        >
                        @{{ value }}                         
                        </message>                                                                 
                      </ul>
                      <input type="text" class="form-control" placeholder="Type Message"
                           v-model="message" @keyup.enter="send">
                </div>
                  </div>
                </div>                
              </div>
              <!-- /.card-body -->
            </div>

            <div>
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