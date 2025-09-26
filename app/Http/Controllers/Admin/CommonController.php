<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\FeedbackTitle;
use Carbon\Carbon;



class CommonController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }               
    public function checkEmail(Request $request){   
                                
            $email = User::where('email', $request->email)->first();                
            $phone = User::where('phone_number', $request->phone)->first();        
            if(!empty($email)){
                return 'email';
            }else if(!empty($phone)){
                return 'phone';
            }else{
                return 0;
            }                   
        
    }
    
    public function feedbackTitle(){
        $data = FeedbackTitle::get();
        return view('job.feedback_title.index', compact('data'));
    }
    
    public function createFeedbackTitle(Request $request){
        $data = new FeedbackTitle;
        $data->title = $request->title;
        $data->save();
        return back()->with('success', 'Title created successfully!');
    }
    public function updateFeedbackTitle(Request $request){
        $data = FeedbackTitle::find($request->id);
        $data->title = $request->title;
        $data->save();
        return back()->with('success', 'Title updated successfully!');
    }
    public function deleteFeedbackTitle($id){
        $delete = FeedbackTitle::find($id)->delete();
        return back()->with('success', 'Title deleted successfully!');
    }
}
