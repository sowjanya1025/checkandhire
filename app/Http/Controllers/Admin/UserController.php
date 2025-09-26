<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $user = User::where('verification', '=', '2')->orWhere('verification', '=', '3')->get();
        return view ('admin.user.index', compact('user'));
    }
    public function add(){
        $role = Role::all();
        return view('admin.user.add', compact('role'));
    }
    public function create(Request $request){                        
        $data = request()->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'email'=>'required|email',
            'phone_number'=>'required',
            'location'=>'required',        
            'password'=>'required|confirmed',
            'verification'=>'required'
        ]);          
        $user = User::create($data);           
        $roles = $request['roles'];         
        if (isset($roles)) {
            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }  
        $id = User::where('email', $request->email)->first();
        $update = User::find($id->id);
        $update->verification=$request->verification;
        $update->save();
        return redirect('/user')->with('message', 'User Successfully Added');
    }
    public function edit($id){
        $user = User::findOrFail($id);        
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, $id){         
        $user = User::find($id); 
            $this->validate($request, [
                'first_name'=>'required',
                'last_name'=>'required',
                'gender'=>'required',
                'email'=>'required|email',
                'phone_number'=>'required',
                'location'=>'required',                        
            ]);
              
            if(empty($request->password)){
                $input = $request->only(['first_name', 'last_name', 'gender', 'email', 'phone_number', 'location']); //Retreive the name, email and password fields
            }else{
                $this->validate($request, [
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'gender'=>'required',
                    'email'=>'required|email',
                    'phone_number'=>'required',
                    'location'=>'required',                        
                    'password'=>'required|confirmed'
                ]);
                $input = $request->only(['first_name', 'last_name', 'gender', 'email', 'phone_number', 'location', 'password']); //Retreive the name, email and password fields
            }
            $update = User::find($id);
            $update->verification=$request->verification;
            $update->save();
            $roles = $request['roles']; //Retreive all roles
            $user->fill($input)->save();
    
            if (isset($roles)) {        
                $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
            }        
            else {
                $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
            }
            return redirect()->route('user.index')->with('message','User successfully edited.');
        }        
        public function delete($id){
            $user = User::findOrFail($id)->delete();
            return redirect()->route('user.index')->with('message','User Deleted Successfully!');
        }    
        public function registeredUserList(){
            $user = User::where('verification', '!=', '2')->where('verification', '!=', '3')->get();
            return view('admin.registeredUser.index', compact('user'));
        }
        public function AddRegisteredUser(){            
                $user = User::all();
                return view('admin.registeredUser.add', compact('user'));            
        }        
        public function CreateRegisteredUser(Request $request){
            $user = request()->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'gender'=>'required',
                'email'=>'required|email',
                'phone_number'=>'required',
                'location'=>'required',        
                'password'=>'required|confirmed'   
            ]);          
            $user = new User;
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->gender=$request->gender;
            $user->email=$request->email;
            $user->phone_number=$request->phone_number;
            $user->location=$request->location;        
            $user->verification=$request->verification;        
            $user->password=$request->password;
            $user->verification=1;
            $user->save();                         
            return redirect('/registeredUser')->with('message', 'User Successfully Added');            
        }
        public function EditRegisteredUser($id){
            $user = User::findOrFail($id);                    
            return view('admin.registeredUser.edit', compact('user'));
        }
        public function UpdateRegisteredUser(Request $request){
            if(!empty($request->password)){
            $user = request()->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'gender'=>'required',
                'email'=>'required|email',
                'phone_number'=>'required',
                'location'=>'required',        
                'password'=>'required|confirmed'   
            ]);          
            }else{
                $user = request()->validate([
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'gender'=>'required',
                    'email'=>'required|email',
                    'phone_number'=>'required',
                    'location'=>'required'
                ]); 
            }
            $user = User::find($request->id);
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->gender=$request->gender;
            $user->email=$request->email;
            $user->phone_number=$request->phone_number;
            $user->location=$request->location;             
            $user->verification=$request->verification; 
            if(!empty($request->password)){
                $user->password=$request->password;            
            }            
            $user->save();                         
            return redirect('/registeredUser')->with('message', 'User Successfully Updted');            
        }
        public function DeleteRegisteredUser($id){            
            $user =User::find($id)->delete();            
            return back()->with('message', 'User Deleted Successfully');
        }
    
        
}
