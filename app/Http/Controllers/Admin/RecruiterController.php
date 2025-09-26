<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class RecruiterController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth']);
    }               
    public function index(){
        $reg_column = DB::getSchemaBuilder()->getColumnListing('users');
        $data = User::where('role', 'Recruiter')->where('role', '!=', 'Admin')->orderByDESC('id')->get();        
        return view('job.recruiter.index', compact('data','reg_column'));
    }
    public function addRecruiter(){
        $reg_column = DB::getSchemaBuilder()->getColumnListing('users');
        return view('job.recruiter.add', compact('reg_column'));
    }
    public function createRecruiter(Request $request){
        $data = request()->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);          
        $user = new User;
        foreach($request->all() as $key => $item){
            if($key != 'email' && $key != 'password' && $key != '_token' && $key != 'password_confirmation'){
                if($key != 'image'){
                   $user->$key = $item;      
                }else{
                     if(!empty($request->file('image')))
                        {           
                            $imageName = url('/').'/public/images/recruiter/'.time().'.'.$request->file('image')->extension();
                            $request->image->move(public_path('images/recruiter/'), $imageName);            
                            $user->image = $imageName;      
                        }    
                }
            }
        }
        $user->email = $request->email;
        $user->role = 'Recruiter';
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('recruiter')->with('success', 'Recruiter Created Successfully!');
    
    }
    public function editRecruiter($id){
        $reg_column = DB::getSchemaBuilder()->getColumnListing('users');
        $data = User::where('id', $id)->first();
        return view('job.recruiter.edit', compact('data', 'reg_column'));
    }
    public function updateRecruiter(Request $request){
      $data = request()->validate([
            'email'=>'required|unique:users,email,'.$request->id
        ]);          
        $user = User::find($request->id);
        foreach($request->all() as $key => $item){
            if($key != 'email' && $key != 'password' && $key != '_token' && $key != 'password_confirmation'){
                if($key != 'image'){
                   $user->$key = $item;      
                }else{
                     if(!empty($request->file('image')))
                        {           
                            $imageName = url('/').'/public/images/recruiter/'.time().'.'.$request->file('image')->extension();
                            $request->image->move(public_path('images/recruiter/'), $imageName);            
                            $user->image = $imageName;      
                        }    
                }
            }
        }
        $user->email = $request->email;
        $user->role = 'Recruiter';
        if(!empty($request->password)){
            $data1 = request()->validate([
            'password'=>'required|confirmed|min:6'
        ]);          
         $user->password = Hash::make($request->password);   
        }
        $user->save();
        return redirect('recruiter')->with('success', 'Recruiter Updated Successfully!');
    }
    
    public function deleteRecruiter($id){
        $data = User::find($id)->delete();
        return back()->with('success', 'Deleted Successfully!');
    }

}
