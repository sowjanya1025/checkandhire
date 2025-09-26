<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\FeedbackTitle;
use Carbon\Carbon;
use DB;


class EmployeeController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth']);
    }               
    public function index(){
        $data = Employee::orderByDESC('id')->get();
        $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        return view('job.employee.index', compact('data', 'emp_column'));
    }
    public function addEmployee(){
        $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        return view('job.employee.add', compact('emp_column'));
    }
    public function createEmployee(Request $request){
        $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        $data = new Employee;
        foreach($emp_column as $key => $item){
            if($item != 'id' && $item != 'updated_at' && $item != 'created_at'){
                if($item != 'image'){
                $data->$item = $request->$item;   
                }else{
                     if(!empty($request->file('image')))
                        {           
                            $imageName = url('/').'/public/images/employee/'.time().'.'.$request->file('image')->extension();
                            $request->image->move(public_path('images/employee/'), $imageName);            
                            $data->image = $imageName;            
                        }    
                }
            }
        }
        $data->save();
        return redirect('employee')->with('success', 'Employee Created Successfully!');
    
    }
    public function editEmployee($id){
        $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        $data = Employee::where('id', $id)->first();
        $feedback = Feedback::where('user_id', $id)->get();
        return view('job.employee.edit', compact('data', 'feedback', 'emp_column'));
    }
    public function updateEmployee(Request $request){
       $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        $data = Employee::find($request->id);
        foreach($emp_column as $key => $item){
            if($item != 'id' && $item != 'updated_at' && $item != 'created_at'){
                if($item != 'image'){
                $data->$item = $request->$item;   
                }else{
                     if(!empty($request->file('image')))
                        {           
                            $imageName = url('/').'/public/images/employee/'.time().'.'.$request->file('image')->extension();
                            $request->image->move(public_path('images/employee/'), $imageName);            
                            $data->image = $imageName;      
                            
                        }    
                }
            }
        }
        $data->save();
        return redirect('employee')->with('success', 'Employee Updated Successfully!');
    
    }
    
    public function deleteEmployee($id){
        $data = Employee::find($id)->delete();
        $delete = Feedback::where('user_id', $id)->delete();
        return back()->with('success', 'Deleted Successfully!');
    }

    public function viewFeedback($id){
        $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        $feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
        $emp = Employee::where('id', $id)->first();
        $feed = Feedback::where('user_id', $id)->orderByDESC('id')->get();
        $title = FeedbackTitle::get();
        return view('job.employee.feedback', compact('emp', 'feed', 'title', 'feed_column', 'emp_column'));
    }
    
    public function createEmployeeFeedback(Request $request){
        $feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
        $feedback = new Feedback;
        foreach($feed_column as $item){
            if($item != 'id' && $item != 'created_at' && $item != 'updated_at'){
                $feedback->$item = $request->$item;    
            }
        }
        $feedback->save();
        return back()->with('success', 'Feedback created successfully!');   
    }
    public function getFeedbackForm(Request $request){
        $feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
        $data = Feedback::where('id', $request->id)->first();
        $title = FeedbackTitle::get();
        return view('job.employee.feedback-form', compact('data', 'title', 'feed_column'));
        
    }
    
    public function updateEmployeeFeedback(Request $request){
        $feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
        $feedback = Feedback::find($request->id);
        foreach($feed_column as $item){
            if($item != 'id' && $item != 'user_id' && $item != 'recruiter_id' && $item != 'created_at' && $item != 'updated_at'){
                $feedback->$item = $request->$item;    
            }
        }
        $feedback->save();
        return back()->with('success', 'Feedback updated successfully!'); 
    }
    public function deleteEmployeeFeedback($id){
        $delete = Feedback::where('id', $id)->delete();
        return back()->with('success', 'Deleted Successfully!');
    }
}
