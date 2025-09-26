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
                <a href="{{url('contribute')}}" class="btn btn-primary btn-sm ml-auto">Contribute History</a>  
            </div>
        </div>
      
      <div class="containerIps">
        <div class="row">
            <table class="table table-bordered" style="font-size:12px">
                <thead>
                    <tr style="background-color:black;color:white">
                      <th>Candidate Name</th>
                      <th>Email</th>
                      <th>Consume Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                    <tr>
                       <td>
                           @php 
                           
                           $emp = DB::table('employee')->where('id', $item->employee_id)->first();
                           if(!empty($emp)){
                           echo $emp->name;
                           }
                           @endphp 
                           
                           </td>
                           <td>
                             @php 
                               if(!empty($emp)){
                               echo $emp->email;
                               }
                           @endphp
                           </td>
                           
                       <td>{{$item->created_at}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center text-red"><h3>No data!</h3></td>
                    </tr>
                    @endforelse
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