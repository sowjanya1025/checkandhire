<div class="row">
                    <div class="col-md-4 text-md-right h-100 align-self-center">
                        <label for="" class="">Customer Name :</label>
                    </div>
                    <div class="col-md-6 my-1">
                        <input type="text" class="form-control" name="customer_name" value="{{old('customer_name') ?? $services->customer_name}}" placeholder="Custome name whom services has provided">                         
                        <input type="hidden" class="form-control" name="id" value="{{$services->id}}" placeholder="Custome name whom services has provided">                         
                    </div>
                </div>       
                <div class="row">
                    <div class="col-md-4 text-md-right h-100 align-self-center">
                        <label for="" class="">Model No :</label>
                    </div>
                    <div class="col-md-6 my-1">
                        <input type="text" class="form-control" name="model_no" value="{{old('model_no') ?? $services->model_no}}" placeholder="eg: VRV, Split, Cassete, AHU etc."> 
                    </div>
                </div>       
                <div class="row">
                    <div class="col-md-4 text-md-right h-100 align-self-center">
                        <label for="" class="">Date :</label>
                    </div>
                    <div class="col-md-6 my-1">
                        <input type="date" class="form-control" name="date" value="{{old('date') ?? $services->date}}" placeholder="Date of services"> 
                    </div>
                </div>       
                <div class="row">
                    <div class="col-md-4 text-md-right h-100 align-self-center">
                        <label for="" class="">Report :</label>
                    </div>
                    <div class="col-md-6 my-1">
                        <input type="file" class="form-control" name="report" placeholder="Customer Name"> 
                    </div>
                </div>       
                <div class="row">
                    <div class="col-md-6 offset-md-4 my-1">
                        <input type="submit" class="btn btn-primary btn-block" value="Add Report">
                    </div>
                </div>     
                @csrf