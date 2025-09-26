<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Index;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addUser()
    {
        // Role::create(['name'=>'writer']);
        // $permission = Permission::create(['name'=>'Write Post']);
        // $role = Role::findById(1);
        // $permission = Permission::findById(1);
        // $permission = Permission::findById(1);        
        // $permission->removeRole($role);
        // $role->revokePermissionTo($permission);
        // $role->givePermissionTo($permission);
        // Auth::user()->givePermissionTo("write_post");
        // Auth::user()->assignRole("writer");
        // return auth()->user()->roles;
        // return auth()->user()->permissions;
        //  return auth()->user()->getPermissionsViaRoles();
        //  return auth()->user()->getAllPermissions();
         return auth()->user()->revokePermissionTo('write_post');
        // return User::permission('write_post')->get();
        
        return view('home');
    }

    public function AdminLogin(){
        return view('auth.AdminLogin');
    }
}
