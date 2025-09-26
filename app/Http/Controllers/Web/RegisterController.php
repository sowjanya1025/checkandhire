<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\Otp;
use Illuminate\Support\Facades\Mail;
use DB;


class RegisterController extends Controller
{
    public function index(){
        $user_col = DB::getSchemaBuilder()->getColumnListing('users');
        return view('auth.web-register', compact('user_col'));
    }
    
    public function register(Request $request){
        $data = request()->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6'
        ]);          
        $user = new User;
        $user->email = $request->email;
        $user->role = 'Recruiter';
        $user->password = Hash::make($request->password);
        $user->otp = rand(100000, 1000000);
        $user->save();
        $otp = $user->otp;
        Mail::to($user->email)->send(new otp($otp));
        return redirect('/otp')->with('success', 'Otp has been sent to the registered email successfully');
    }
    
    public function signin(){
       return view('auth.web-login');
    }
    
    public function otp(){
       return view('auth.web-otp');
    }
    
    public function verifyOtp(Request $request){
        $data = request()->validate([
            'otp'=>'required',
        ]);         
        $check = User::where('otp', $request->otp)->first();
        if(!empty($check)){
            $check->is_verified = '1';
            $check->otp = '';
            $check->save();
            auth()->login($check);
            return redirect('/')->with('success', 'Account verified successfully');
        }else{
            return back()->with('failed', 'Invalid otp was sent');
        }
        
    }
}
