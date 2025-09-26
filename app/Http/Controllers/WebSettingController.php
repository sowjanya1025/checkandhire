<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class WebSettingController extends Controller
{
    public function setting(){
        $setting = Setting::get()->first();
        return view('setting', compact('setting'));
    }
}
