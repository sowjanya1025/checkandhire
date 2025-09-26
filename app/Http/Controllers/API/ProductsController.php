<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CustomerModel;
use App\Models\Product;
use App\Models\Event;
use App\Models\Category;
use App\Models\FavouriteModel;
use App\Models\FeedsModel;
use App\Models\Restraunt;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    // Add Favourite Product API
    public function addFavProduct(Request $request){

        // Input Data..
        $input = $request->all();

        // Validation
        $validator = Validator::make($input, [
          'user_id' => 'required',
          'product_id' => 'required',
          ]);

        if($validator->fails()) {
          return response()->json(['success'=>false,"data"=>$validator->errors()]);
        }

        // User Table
        $userCheck = CustomerModel::where('id',$input['user_id'])->first();

        // Products Table
        $Product = Product::where('id',$input['product_id'])->first();

        if(!empty($userCheck)){

          if(!empty($Product)){

          $checkFav = FavouriteModel::where('product_id',$input['product_id'])->count();

          if($checkFav == 0){

          // Date set
          date_default_timezone_set('asia/kolkata');

          // Category Table
          $Category = Category::where('id',$Product->category_id)->first();


          // Add user and products
          $FavouriteModel = new FavouriteModel;
          $FavouriteModel->user_id = $userCheck->id;
          $FavouriteModel->product_id = $Product->id;
          $FavouriteModel->order_image = url('/').'/images/'.$Product->image;
          $FavouriteModel->name = $Product->name;
          $FavouriteModel->order_price = $Product->price;
          $FavouriteModel->category = $Category->name;
          $FavouriteModel->dates = date('d-m-Y');

          if($FavouriteModel->save()){
            return response()->json(['message'=>'Product add to favourite list','success'=>true]);
          }else{
            return response()->json(['message'=>'Something went wrong','success'=>true]);
          }
        }else{
          return response()->json(['message'=>'Already add product in favourite list..','success'=>true]);
        }
      }else{
        return response()->json(['message'=>'Product not found','success'=>false]);
      }     
        }else{
          return response()->json(['message'=>'User not found','success'=>false]);
        }
  }

    // Remove Favourite Product API
    public function removeFavProduct(Request $request){

      // Input Data..
      $input = $request->all();

      // Validation
      $validator = Validator::make($input, [
        'user_id' => 'required',
        'product_id' => 'required',
        ]);

      if($validator->fails()) {
        return response()->json(['success'=>false,"data"=>$validator->errors()]);
      }

      // FavouriteModel table
      $checkFavourite = FavouriteModel::where('user_id',$input['user_id'])->where('product_id',$input['product_id'])->count();

        if(!empty($checkFavourite)){

          $delFav = FavouriteModel::where('user_id', $input['user_id'])->where('product_id',$input['product_id'])->delete();
          if(!empty($delFav)){
            return response()->json(['message'=>'Product remove successful', 'success'=>true]);
          }else{
            return response()->json(['message'=>'Something went wrong..', 'success'=>false]);
          }
        }
      else{
        return response()->json(['message'=>'There is no product in favourite list..', 'success'=>false]);
      }
  }

      // Favourite Product list API
    public function listFavProduct(Request $request){

        // Input Data..
        $input = $request->all();
  
        // Validation
        $validator = Validator::make($input, [
          'user_id' => 'required',
          ]);
  
        if($validator->fails()) {
          return response()->json(['success'=>false,"data"=>$validator->errors()]);
        }
  
        // FavouriteModel table
        $checkFavourite = FavouriteModel::where('user_id',$input['user_id'])->count();
  
          if(!empty($checkFavourite)){
  
            $listFav = FavouriteModel::where('user_id', $input['user_id'])->get();

            return response()->json(['message'=>'Product fetch successful', 'success'=>true,'favourite_list'=>$listFav]);
          }
        else{
          return response()->json(['message'=>'There is no products in favourite list..', 'success'=>false]);
        }
    }


    // Trending Drink API
    public function trendingDrink(){
      
      // Product Table
      $Product = Product::orderBy('sale', 'desc')->take(3)->get();

      if(!empty($Product)){
        return response()->json(['message'=>'Product fetch successful', 'success'=>true,'trending_drink'=>$Product]);
      }else{
        return response()->json(['message'=>'There is no product trending', 'success'=>false]);
      }
    }
    
    // Trending Drink List API
    public function trendingDrinkList(){
      
      // Product Table
      $Product = Product::select('*')->get();

      if(!empty($Product)){
        return response()->json(['message'=>'Product fetch successful', 'success'=>true,'trending_drink'=>$Product]);
      }else{
        return response()->json(['message'=>'There is no product trending', 'success'=>false]);
      }
    }

    // Add Post by User
    public function postFeed(Request $request){
      $input = $request->all();
  
      // Validation
      $validator = Validator::make($input, [
        'user_id' => 'required',
        'image' => 'required',
        'message' => 'required',
        'location' => 'required',
        ]);
  
      if($validator->fails()) {
        return response()->json(['success'=>false,"data"=>$validator->errors()]);
      }
  
      // Check Users
      $users = CustomerModel::where('id',$input['user_id'])->count();
  
      if($users == 1){

         // Date set
         date_default_timezone_set('asia/kolkata');

        $FeedsModel = new FeedsModel;
        $FeedsModel->user_id = $input['user_id'];
        $FeedsModel->message = $input['message'];
        $FeedsModel->location = $input['location'];
        $FeedsModel->dates = date('d-m-Y');
        $FeedsModel->save();

        // Insert Images
        $imgname = '';
        if($request->hasFile('image'))
        { 
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); 
            $extention = $file->getClientOriginalExtension(); 
            $imgname = uniqid().$filename; 
            $destinationPath = public_path(). '/images/'; //print_r($destinationPath); exit();
            $file->move($destinationPath, $imgname);
  
            $FeedsModel->user_id = $input['user_id'];
            $FeedsModel->images = url('/').'/images/'.$imgname;
            $FeedsModel->save();
        } 
        
        if(isset($FeedsModel)){
          return response()->json(['message'=>'Post upload successful..','success'=>true]);
          }else{
            return response()->json(['message'=>'Something went wrong','success'=>false]);
          }
      }else{
        return response()->json(['message'=>'User is not exists','success'=>false]);
      }
    }

    
    // List Feeds Post by User
    public function listFeed(Request $request){
      $input = $request->all();
  
      // Validation
      $validator = Validator::make($input, [
        'user_id' => 'required',
        ]);
  
      if($validator->fails()) {
        return response()->json(['success'=>false,"data"=>$validator->errors()]);
      }
    
    $user_id = $request->user_id; 
    
    $error_code 	= true;
    $error_string = "Feed post fetch..";
    $data 			= [];
    
    $result =  DB::select("SELECT id,user_id,message,images,dates,location FROM `feeds` WHERE `user_id`='$user_id' ORDER BY id DESC ");
   
    if(!$result)
    {
        $error_code = false;
    }
    else
    {
        $count = count($result);
        
        if($count == 0)
        {
            $error_code = true;
        }
        else
        {
            foreach ($result as $res)
            {
                
                $row1 = (array)$res;
                
                $result1 = CustomerModel::where('id', $res->user_id)->get();
              //  var_dump($result1); die;
                if(!$result1)
                {
                    $error_code = false;
                    $error_string = "Problem with server.";
                }
                else
                {
                    //$count2 = count($result1);
                    if(empty($result1)){
                        $row1['profile'] = "";
                        $row1['first_name'] = "";
                        $row1['last_name'] = "";
                    }else{
                        
                        foreach ($result1 as $res1)
                        {
                            $row1['profile'] = $res1->profile;
                            $row1['first_name'] = $res1->first_name;
                            $row1['last_name'] = $res1->last_name;
                        }
                    }

                }
                $data[] = $row1;
            }
        }
    }
    return response()->json(["message"=>$error_string,"success" => $error_code,"feedlist" => $data]);

}

    // List Feeds Post
    public function listFeedAll(Request $request){
    
    $error_code 	= true;
    $error_string = "Feed post fetch..";
    $data 			= [];
    
    $result =  DB::select("SELECT id,user_id,message,images,dates,location FROM `feeds` ORDER BY id DESC ");
   
    if(!$result)
    {
        $error_code = false;
    }
    else
    {
        $count = count($result);
        
        if($count == 0)
        {
            $error_code = true;
        }
        else
        {
            foreach ($result as $res)
            {
                
                $row1 = (array)$res;
                
                $result1 = CustomerModel::where('id', $res->user_id)->get();
              //  var_dump($result1); die;
                if(!$result1)
                {
                    $error_code = false;
                    $error_string = "Problem with server.";
                }
                else
                {
                    //$count2 = count($result1);
                    if(empty($result1)){
                        $row1['profile'] = "";
                        $row1['first_name'] = "";
                        $row1['last_name'] = "";
                    }else{
                        
                        foreach ($result1 as $res1)
                        {
                            $row1['profile'] = $res1->profile;
                            $row1['first_name'] = $res1->first_name;
                            $row1['last_name'] = $res1->last_name;
                        }
                    }

                }
                $data[] = $row1;
            }
        }
    }
    return response()->json(["message"=>$error_string,"success" => $error_code,"feedlist" => $data]);

}

    // Event List API
    public function eventList(Request $request){
      
      // Event Table
      $Product = Event::select('id','image','title','location','description','rating')->orderByRaw('id DESC')->get();

      if(!empty($Product)){
        return response()->json(['message'=>'Event list fetch successful', 'success'=>true,'event_list'=>$Product]);
      }else{
        return response()->json(['message'=>'There is no event list..', 'success'=>false]);
      }
    }
    
        // Drink list by category API
    public function drinkByCategory(Request $request){

        // Input Data..
        $input = $request->all();

        // Validation
        $validator = Validator::make($input, [
        'category_id' => 'required',
        ]);
      
        if($validator->fails()) {
            return response()->json(['success'=>false,"data"=>$validator->errors()]);
        }
      
      // Product Table
      $Product = Product::where('category_id', $input['category_id'])->get();
    
      if(!empty($Product)){
        return response()->json(['message'=>'Product fetch successful', 'success'=>true,'drink_list'=>$Product]);
        }else{
            return response()->json(['message'=>'There is no product trending', 'success'=>false]);
        }
    }

    // Category list API
    public function categoryList(Request $request){
      
      // Category Table
      $Category = Category::select('id','image','name')->get();
    
      if(!empty($Category)){
            return response()->json(['message'=>'Category fetch successful', 'success'=>true,'category_list'=>$Category]);
      }else{
            return response()->json(['message'=>'There is no category list', 'success'=>false]);
        }
    }
    
    // List Restaurant Post
    public function AllRestaurant(Request $request){
    
    $error_code 	= true;
    $error_string = "Restaurant post fetch..";
    $data 			= [];
    
    $result =  DB::select("SELECT * FROM `restraunts` ORDER BY id DESC ");
   
    if(!$result)
    {
        $error_code = false;
    }
    else
    {
        $count = count($result);
        
        if($count == 0)
        {
            $error_code = true;
        }
        else
        {
            foreach ($result as $res)
            {
                
                $row1 = (array)$res;
                
                $result1 = CustomerModel::where('id', $res->user_id)->get();
              //  var_dump($result1); die;
                if(!$result1)
                {
                    $error_code = false;
                    $error_string = "Problem with server.";
                }
                else
                {
                    //$count2 = count($result1);
                    if(empty($result1)){
                        $row1['profile'] = "";
                        $row1['first_name'] = "";
                        $row1['last_name'] = "";
                    }else{
                        
                        foreach ($result1 as $res1)
                        {
                            $row1['profile'] = $res1->profile;
                            $row1['first_name'] = $res1->first_name;
                            $row1['last_name'] = $res1->last_name;
                        }
                    }

                }
                $data[] = $row1;
            }
        }
    }
    return response()->json(["message"=>$error_string,"success" => $error_code,"restaurantlist" => $data]);

}

    // Category list API
    public function drinkByRestaurant(Request $request){
      
        // Input Data..
        $input = $request->all();

        // Validation
        $validator = Validator::make($input, [
        'res_id' => 'required',
        ]);
      
        if($validator->fails()) {
            return response()->json(['success'=>false,"data"=>$validator->errors()]);
        }
      
      // Drink By Restaurant Table
      $Product = Product::where('res_id', $input['res_id'])->get();
    
      if(!empty($Product)){
        return response()->json(['message'=>'Product fetch successful', 'success'=>true,'drink_list'=>$Product]);
        }
        else{
            return response()->json(['message'=>'There is no product', 'success'=>false]);
        }
    }


}
