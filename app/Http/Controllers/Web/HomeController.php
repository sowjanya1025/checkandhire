<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Feedback;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Contact;
use App\Mail\ForgotPassword;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use DB;


class HomeController extends Controller
{
    public function index(Request $request){
        $employee = Employee::orderByDESC('id')->paginate(12);
        return view('website.index', compact('employee'));
    }
    
    public function getEmployee(Request $request){
        $employee = Employee::orderByDESC('id')->where(function($query) use ($request){
            if(!empty($request->name)){
                $query->where('name', $request->name);
            }
            if(!empty($request->pan)){
                $query->where('pan', $request->pan);
            }
            if(!empty($request->aadhaar)){
                $query->where('aadhaar', $request->aadhaar);
            }
            if(!empty($request->mobile)){
                $query->where('phone_number', $request->mobile);
            }
        })->get();
        
            $html = '';
             foreach($employee as $item){
             $url = $item->image ? asset($item->image) : asset("images/dummy1.png");
             $positive = Feedback::where('user_id', $item->id)->sum('positive');
             $negative = Feedback::where('user_id', $item->id)->sum('negative');
   
             $html .='<div class="row" style="box-shadow: 0 0 3px lightsteelblue;margin: 10px 0px;padding:15px 0px;border-radius: 4px;">';
             $html .='<div class="col-xs-12 col-md-4">'; 
             $html .='<img src="'.$url.'" class="img-responsive"></div>';
             $html .='<h3 class="ml-3">'.$item->name.'</h3>';
             $html .='<div class="col-xs-12 col-md-8">';
             $html .='<div class="row"><div class="col-xs-12 col-md-8">';
             $html .='<h4>Positive : '.$positive.'</h4>';
             $html .='<h4>Negative : '.$negative.'</h4>';
             $html .='</div></div>';
             $html .='<a href="'.url("employee-profile", [$item->id]).'" value="Search" class="inInputs ipBtnS">View Details</a>';
             $html .='</div></div></div></div>';
             
             
             
            //  $html .='<p class="profile-text-designation">'.$item->designation.'</p>';
            //  $html .='</a></div></div>';
            }   
            
            if(empty($employee->count())){
                $html = '<h4 style="margin:auto;color:red;text-align:center">No Matching Record Found!</h4>';
            }
     
        return $html;
    }
    
    public function forgotPassword(){
           if(auth()->check()){
            return redirect('/');
        }
        return view('website.reset-password.forgot-password-form');
    }
    
    public function SendLink(Request $request){
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        $link = url('reset-password/'.$token);
        $update = User::where('email', $request->email)->first();
        if(!empty($update)){
        $update->forgot_token = $token;
        $update->save();
        }else{
            return back()->with('failed', 'Email does not match our records!');
        }
       Mail::to($request->email)->send(new ForgotPassword($link));
       return back()->with('success', 'Email sent successfully!');
    }
    
    public function resetPassword(){
        if(auth()->check()){
            return back();
        }
        return view('website.reset-password.reset-password-form');
    }
    
    public function changePassword(Request $request){
        request()->validate([
        'password'=>'required',
        'password'=>'confirmed|min:8'
        ]);
        $user = User::where('forgot_token', $request->forgot_token)->first();
        // if(!empty($user)){
            $user->password = Hash::make($request->password);
            $user->forgot_token = '';
            $user->save();
        // }else{
        //     return back()->with('failed', 'Token has expired!');
        // }
        
        Auth::login($user);
        return redirect('/');
    }
    
    public function contact(){
        return view('website.contact');
    }
    
    public function saveContact(Request $request){
        $save = new Contact;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->number = $request->number;
        $save->message = $request->message;
        $save->save();
        \Mail::to('zaidn7445@gmail.com')->send(new ContactMail($save));
        return back()->with('success', 'Submitted Successfully!');
    }
    
    public function test(){
        
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "info@checkandhire.com";
        $to = "santosh@saieshinfosolutions.com";
        $subject = "Checking from checkandhire";
        $message = "PHP mail works just fine";
        $headers = "From:" . $from;
        if(mail($to,$subject,$message, $headers)) {
        echo "The email message was sent.";
        } else {
        echo "The email message was not sent.";
        }

    }
}
