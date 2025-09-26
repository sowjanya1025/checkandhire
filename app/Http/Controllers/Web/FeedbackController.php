<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\Otp;
use App\Mail\sendAddFeedbackMail;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\FeedbackTitle;



class FeedbackController extends Controller
{
    public function index(){
        $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        $feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
        $user_cold = DB::getSchemaBuilder()->getColumnListing('users');
        $title = FeedbackTitle::get();
        
        $user = User::where('id', auth()->id())->first();
        $check_null = [];
        foreach($user_cold as $key => $item){
            if($item != 'id' && $item != 'role' && $item != 'password' && $item != 'otp' && $item != 'is_verified' && $item != 'status' && $item != 'is_active' && $item != 'verification' && $item != 'forgot_token' &&  $item != 'email_verified_at' &&  $item != 'remember_token' &&  $item != 'contribute' &&  $item != 'consume' &&  $item != 'created_at' &&  $item != 'updated_at'){
                  if($user->$item == ''){
                        $check_null[] = $item;
                 }
            }
        }
        if(count($check_null) > 0){
            return redirect('profile')->with('failed_array', $check_null);
        }
        
        return view('website.feedback.index', compact('emp_column', 'feed_column', 'title'));
    }
    
    public function createFeedback(Request $request){
     DB::beginTransaction();

    try {
            $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
            $feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
            $employee = Employee::where('Aadhaar', $request->Aadhaar)->first();
            if(empty($employee)){
            $employee = new Employee;
            foreach($emp_column as $item){
                if($item != 'positive' && $item != 'negative'  && $item != 'id' && $item != 'user_id' && $item != 'created_at' && $item != 'updated_at'){
                if($item != 'image'){
                    $employee->$item = $request->$item;    
                }else{
                     if(!empty($request->file('image')))
                        {           
                            $imageName = '/images/employee/'.time().'.'.$request->file('image')->extension();
                            $request->image->move(public_path('images/employee/'), $imageName);            
                            $employee->image = $imageName;      
                        }    
                    }
                }
            }
       
            $employee->save();
            }
            $ids = [];
            if(!empty($request->title)){
                foreach($request->title as $key => $title){
                    $feedback = new Feedback;
                    foreach($feed_column as $item){
                        if($item != 'id' && $item != 'user_id' && $item != 'title' && $item != 'feedback' && $item != 'created_at' && $item != 'updated_at'){
                            $feedback->$item = $request->$item;    
                        }else if($item == 'user_id'){
                            $feedback->user_id = $employee->id;    
                        }else if($item == 'title'){
                            $feedback->title = $title;
                        }else if($item == 'feedback'){
                            $f = 'feedback'.$title;
                            $feedback->feedback = $request->$f;
                        }
                        
                    }
                    $feedback->save();
                    $increaseContribute = User::find(auth()->id());
                    $increaseContribute->contribute = $increaseContribute->contribute+1;
                    if(is_float(($increaseContribute->contribute)/2)){
                        $increaseContribute->consume = $increaseContribute->consume;
                    }else{
                        $increaseContribute->consume = $increaseContribute->consume+1;    
                    }
                    
                    $increaseContribute->save();
                    $ids[] = $feedback->id;
                }
            }else{
                 $feedback = new Feedback;
                    foreach($feed_column as $item){
                        if($item != 'id' && $item != 'user_id' && $item != 'title' && $item != 'feedback' && $item != 'created_at' && $item != 'updated_at'){
                            $feedback->$item = $request->$item;    
                        }else if($item == 'user_id'){
                            $feedback->user_id = $employee->id;    
                        }
                    }
                    if(isset($request->positive)){
                    $feedback->positive = 1;    
                    }
                    if(isset($request->negative)){
                    $feedback->negative = 1;    
                    }
                    $feedback->save();
                    $increaseContribute = User::find(auth()->id());
                    $increaseContribute->contribute = $increaseContribute->contribute+1;
                    if(is_float(($increaseContribute->contribute)/2)){
                        $increaseContribute->consume = $increaseContribute->consume;
                    }else{
                        $increaseContribute->consume = $increaseContribute->consume+1;    
                    }
                    
                    $increaseContribute->save();
                    $ids[] = $feedback->id;
            }
        Mail::to($employee->email)->send(new sendAddFeedbackMail($ids));
            DB::commit();
        // all good
    } catch (\Exception $e) {
        DB::rollback();
        throw $e;
        return back()->with('failed', 'Something went wrong');
    }
       
        return back()->with('success', 'Feedback created successfully!');
    }
}
