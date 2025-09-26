<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     
    
    protected function credentials(Request $request)
    {        
        $user = User::where('email', $request->email)->first();     
        // if(!empty($user)){
        //     if($request->tester == 'bar_owner' && $user->verification == '1' || $user->verification == '3'){
        //         return ['email'=>'Email is not verified.'];
        //     }
        //     if($request->tester == 'bar_owner' && $user->verification == '10'){
        //         return ['email'=>'You are at the wrong place'];
        //     }
        //     if($request->tester == 'super_admin' && $user->verification == '1' || $user->verification == '3'){
        //         return ['email'=>'Email is not verified.'];
        //     }
        //     if($request->tester == 'super_admin' && $user->verification == '2'){
        //         return ['email'=>'You are at the wrong place'];
        //     }
        // }else{
            
        //     return ['email'=>'Records not found'];
        // }
        if($request->from == 'web' && $user->role == 'Admin'){
            session()->flash('failed', 'Incorrect credentails!');
              return ['email'=>'Incorrect credentails!'];
        }
        if($request->tester == 'super_admin' && $user->role == 'Recruiter'){
            session()->flash('failed', 'Incorrect credentails!');
              return ['email'=>'Incorrect credentails!'];
        }
        
        if($user->is_verified == '0'){
            session()->flash('failed', 'Account not verified');
              return ['email'=>'Records not found'];
        }
        $credentials = $request->only($this->username(), 'password');
        // if($request->tester == 'bar_owner'){
        //     $credentials['verification'] = 2;            
        // }else{
        //     $credentials['verification'] = 10;
        // }        
        return $credentials;
    }
    
    protected function authenticated(Request $request, $user) {
    	 if ($request->from == 'web') {
    	 	return redirect('/');
    	 }else{
    	     return redirect('/dashboard');
    	 }
    }
}
