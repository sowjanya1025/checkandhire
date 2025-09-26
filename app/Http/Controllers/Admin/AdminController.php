<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Index;

class AdminController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }           
    public function index(){
        
        return view('admin.index');
    }

    public function test(){        
        $data = $this->index->CommonContent();
        $result = Auth::User()->role_status;
        return view('admin.index', compact('result'));
    }
    
    // function index(Request $request)
    // {
    //     $user= User::where('email', $request->email)->first();
    //     // print_r($data);
    //         if (!$user || !Hash::check($request->password, $user->password)) {
    //             return response([
    //                 'message' => ['These credentials do not match our records.']
    //             ], 404);
    //         }
        
    //          $token = $user->createToken('my-app-token')->plainTextToken;
        
    //         $response = [
    //             'user' => $user,
    //             'token' => $token
    //         ];
        
    //          return response($response, 201);
    // }
}
