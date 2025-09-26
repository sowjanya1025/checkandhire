<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\UserRegisterMail;
use App\Mail\OtpForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use DB;

class CustomerController extends Controller
{
    // Signup by Mobile
    public function signup(Request $request){

        // Input Data..
        $input = $request->all();

        // Validation
        $validator = Validator::make($input, [
          'email' => 'required',
          'first_name' => 'required',
          'last_name' => 'required',
          'gender' => 'required',
          'phone_number' => 'required',
          'password' => 'required',
          ]);

        if($validator->fails()) {
          return response()->json(['success'=>false,"data"=>$validator->errors()]);
        }

        // Date set
        date_default_timezone_set('asia/kolkata');

        // Check Email already exists
        $check_email = CustomerModel::where('email',$input['email'])->first();        
          if(empty($check_email)){
            $user = new CustomerModel;
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->email = $input['email'];
            $user->gender = $input['gender'];
            $user->phone_number = $input['phone_number'];
            $user->location =0;
            $user->social_id = 0;
            $user->login_type = 'mobile';
            $user->device_token = 0;
            $user->password = bcrypt($input['password']);
            $user->profile = 0;
            $user->status = 1;
            $user->is_active = 1;
            $user->verification = 0;
            $user->otp = rand(1000,9999);
            $user->date_time = date('d-m-Y : H:m:s a');
            if($user->save()){

              // Mail send otp

              $otp = User::where('email', $input['email'])->first();
              $data = $otp->otp;
              $name = $otp->first_name;
               Mail::to($input['email'])->send(new UserRegisterMail($data, $name));

              // end mail otp function

              return response()->json(['message'=>'Registration sucsessful...', 'success'=>true]);
            }else{
              return response()->json(['message'=>'Something went wrong', 'success'=>false]);
            }

          }
        else{
          return response()->json(['message'=>'Email already exists', 'success'=>false]);
        }
    }


    // Signup by social media
    public function signupbysocial(Request $request){

      // Input Data..
      $input = $request->all();

      // Validation
      $validator = Validator::make($input, [
        'first_name' => 'required',
        'last_name' => 'required',
        'social_id' => 'required',
        'login_type' => 'required',
        'device_token' => 'required',
        ]);

      if($validator->fails()) {
        return response()->json(['success'=>false,"data"=>$validator->errors()]);
      }

      // Date set
      date_default_timezone_set('asia/kolkata');

    //   Check Email already exists
      $check_email = CustomerModel::where('social_id',$input['social_id'])->first();

        if(empty($check_email)){
          $user = new CustomerModel;
          $user->first_name = $input['first_name'];
          $user->last_name = $input['last_name'];
          $user->email = $input['email'];
          $user->gender = 'NULL';
          $user->phone_number = 0;
          $user->location = 'location';
          $user->social_id = $input['social_id'];
          $user->login_type = $input['login_type'];
          $user->device_token = $input['device_token'];
          $user->password = 0;
          $user->profile = 0;
          $user->status = 1;
          $user->is_active = 1;
          $user->verification = 1;
          $user->otp = 0;
          $user->date_time = date('d-m-Y : H:m:s a');
          if($user->save()){
            return response()->json(['message'=>'Registration sucsessful...', 'success'=>true]);
          }else{
            return response()->json(['message'=>'Something went wrong', 'success'=>false]);
          }
        }
      else{
        CustomerModel::where('social_id',$input['social_id'])->update([
          'first_name' => $input['first_name'],
          'last_name' => $input['last_name'],
          'email' => $input['email'],
          'social_id' => $input['social_id'],
          'login_type' => $input['login_type'],
          'device_token' => $input['device_token'],
          'status' => 1,
          'date_time' => date('d-m-Y : H:m:s a')
        ]);
        return response()->json(['message'=>'Login Successful..', 'success'=>true]);
      }
}

    // Login
  public function login(Request $request){
      $input = $request->all();

      // Validation
      $validator = Validator::make($input, [
        'email' => 'required',
        'password' => 'required',
        ]);

      if($validator->fails()) {
        return response()->json(['success'=>false,"data"=>$validator->errors()]);
      }

      // Check Verification
      
      $emailcheck = CustomerModel::where('email',$input['email'])->count();

      if($emailcheck == 1){

        // Email and Password 
        $email = CustomerModel::where('email',$input['email'])->first();
        if(Hash::check($input['password'] ,$email->password)){

          if($email->verification == 1){
            $res = [];
            CustomerModel::where('email',$input['email'])->update(['status' => '1']);

            $res['id'] = $email->id;
            $res['first_name'] = $email->first_name;
            $res['last_name'] = $email->last_name;
            $res['email'] = $email->email;
            $res['gender'] = $email->gender;
            $res['phone_number'] = $email->phone_number;
            $res['location'] = $email->location;
            $res['social_id'] = $email->social_id;
            $res['device_token'] = $email->device_token;
            $res['date_time'] = $email->date_time;
            return response()->json(['message'=>'Login succesful..',"data"=>$res,'success'=>true]);
          }else{
            return response()->json(['message'=>'Email is not verified..','success'=>false]);
          }

        }else{
          return response()->json(['message'=>'Password not match','success'=>false]);
        }    

      }else{
        return response()->json(['message'=>'Email is not exists','success'=>false]);
      }

  }

   // OTP verification
  public function otpVerification(Request $request){
    $input = $request->all();

    // Validation
    $validator = Validator::make($input, [      
      'otp' => 'required',
      ]);

    if($validator->fails()) {
      return response()->json(['success'=>false,"data"=>$validator->errors()]);
    }

    // Check Verification
    
    $emailcheck = CustomerModel::where('otp',$input['otp'])->count();

    if($emailcheck == 1){

      // Email and Password 
      $email = CustomerModel::where('otp',$input['otp'])->first();

      CustomerModel::where('email',$email->email)->update([
        'verification'=>'1'
      ]);   

      return response()->json(['message'=>'OTP is verified','success'=>true]);

    }else{
      return response()->json(['message'=>'OTP is wrong..','success'=>false]);
    }
  }
  
  // Forget Password OTP verification
  public function forgotPassword(Request $request){
    $input = $request->all();

    // Validation
    $validator = Validator::make($input, [      
      'email' => 'required',
      ]);

    if($validator->fails()) {
      return response()->json(['success'=>false,"data"=>$validator->errors()]);
    }

    // Check Verification
    $emailcheck = CustomerModel::where('email',$input['email'])->where('verification', 1)->count();
        
        if($emailcheck == 1){
              $token = openssl_random_pseudo_bytes(16);
              $token = bin2hex($token);
              CustomerModel::where('email',$input['email'])->update(['forgot_token'=> $token]);  
              // Email and Password 
              $email = CustomerModel::where('email',$input['email'])->first();
              $id = $email->id;
              $name = $email->first_name;
              $token = $email->forgot_token;
               Mail::to($email->email)->send(new OtpForgotPassword($id, $name, $token));
        
              return response()->json(['message'=>'Password Reset link has sent to your email..','success'=>true]);
        }else{
          return response()->json(['message'=>'Email not found..','success'=>false]);
        }
  }
  
  // Forget Password OTP verification
  public function ForgotPassVerification(Request $request){
    $input = $request->all();

    // Validation
    $validator = Validator::make($input, [      
      'otp' => 'required',
      ]);

    if($validator->fails()) {
      return response()->json(['success'=>false,"data"=>$validator->errors()]);
    }

    // Check Verification
    
    $emailcheck = CustomerModel::where('otp',$input['otp'])->count();

    if($emailcheck == 1){

      // Email and Password 
      $email = CustomerModel::where('otp',$input['otp'])->first();

      return response()->json(['email'=>$email->email,'message'=>'OTP is verified','success'=>true]);

    }else{
      return response()->json(['message'=>'OTP is wrong..','success'=>false]);
    }
  }
  
  // New Password Create
  public function CreateNewPassword(Request $request){
    $input = $request->all();

    // Validation
    $validator = Validator::make($input, [
      'email' => 'required',
      'password' => 'required',
      're_type_password' => 'required',
      ]);

    if($validator->fails()) {
      return response()->json(['success'=>false,"data"=>$validator->errors()]);
    }

    // Check Verification
    
    $emailcheck = CustomerModel::where('email',$input['email'])->count();

    if($emailcheck == 1){
        
    if($input['password'] == $input['re_type_password']){

      // New Password 
      
      CustomerModel::where('email',$input['email'])->update([
        'password'=> bcrypt($input['password'])
      ]);

      return response()->json(['message'=>'New Password has been created..','success'=>true]);
    }else{
         return response()->json(['message'=>'Password not match','success'=>false]);
    }
    }else{
      return response()->json(['message'=>'Email is wrong','success'=>false]);
    }
  }
  
  
  // Logout API
  public function logout(Request $request){
    $input = $request->all();

    // Validation
    $validator = Validator::make($input, [
      'user_id' => 'required',
      ]);

    if($validator->fails()) {
      return response()->json(['success'=>false,"data"=>$validator->errors()]);
    }
    
     $user_id = CustomerModel::where('id',$input['user_id'])->count();

    if($user_id == 1){

      // Update Table 
     CustomerModel::where('id',$input['user_id'])->update([
        'status'=> '0'
     ]);
    
        
    }else{
      return response()->json(['message'=>'User not found..','success'=>false]);
    }

      return response()->json(['message'=>'Logout Successful..','success'=>true]);
    }
    public function resetPassword($id, $token){
        $id = $id;
        $token = $token;
        return view('ForgotPassword.index', compact('id', 'token'));
      }
    public function ChangedPassword(Request $request){
            $input = $request->all();
        $data = request()->validate([
        'password'=>'min:6|required|confirmed'
        ]);
        $data = User::find($input['id']);
        
            if($data->forgot_token == $input['token']){
            $data->password = bcrypt($input['password']);
            $data->forgot_token = '';
            $data->save();
            Session()->flash('success', 'Change Password Successfully');    
            }else{
                Session()->flash('failed', 'Link Has Expired');    
            }        
        return back();
    }
}
