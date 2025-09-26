<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Hash;
class SettingController extends Controller
{
    public function index(){
        $setting = Setting::get()->first();
        return view('admin.setting.index', compact('setting'));
    }
    public function update(Request $request){
        $cate = $request->validate([
            'setting'=>'required'            
        ]);
        $cate = Setting::find($request->id);
        $cate->setting=$request->setting;        
        $cate->save();
        return redirect()->route('setting.index')->with('message', 'Update Successfully');
    }
        public function changePassword(){
        return view('job.setting.change-password');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed|min:6'
        ]);

        $update = User::find(auth()->id())->first();

        if(Hash::check($request->old_password, $update->password)){
            $update->password = Hash::make($request->password);
            $update->save();            
        }else{
            return back()->with('failed', 'Password does not match');
        }
        return back()->with('success', 'Password updated successfully!');

    }
    
}
