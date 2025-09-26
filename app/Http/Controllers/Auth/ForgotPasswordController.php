<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Mail\ForgotPasswordAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;
    public function forgotPasswordAdmin(Request $request){        
            $request->validate([
                'email'=>'required'
            ]);
        
            // Check Verification
            $emailcheck = User::where('email',$request->email)->count();                
                if($emailcheck == 1){
                    $verify = User::where('verification', 2)->count();
                    if($verify == 1){
                      $token = openssl_random_pseudo_bytes(16);
                      $token = bin2hex($token);
                      User::where('email', $request->email)->update(['forgot_token'=> $token]);  
                      // Email and Password 
                      $email = User::where('email', $request->email)->first();
                      $id = $email->id;
                      $name = $email->first_name;
                      $token = $email->forgot_token;
                       Mail::to($email->email)->send(new ForgotPasswordAdmin($id, $name, $token));
                       return back()->with('message', 'Email sent successfully!');
                    }else{
                        return back()->with('message', 'Account Not Verified');
                    }
                      return back()->with('message', 'Email sent successfully!');
                }else{
                    return back()->with('message', 'Email does not match with records');
                }
              
    }    
    public function resetPasswordAdmin($id, $token){
        $id = $id;
        $token = $token;
        return view('auth.resetPasswordAdmin', compact('id', 'token'));
    }

    public function ChangedPasswordAdmin(Request $request){
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

