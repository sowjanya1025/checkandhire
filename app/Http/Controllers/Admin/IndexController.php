<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Contact;

class IndexController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index(){
        $user = User::where('verification', '!=', '2')->get()->count();        
        $event = Event::get()->count();        
        return view('job.index', compact('user', 'event'));
    }
    
    public function contact(){
        $data = Contact::get();
        return view('job.contact', compact('data'));
    }
}
