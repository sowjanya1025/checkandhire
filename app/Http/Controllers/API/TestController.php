<?php

namespace App\Http\Controllers\API;
use App\Mail\UserRegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    // function index(){
    //     $data = [
    //         'name'=>'Test Name',
    //         'Body'=>'Body',
    //     ];
    //     Mail::to('zaidn7445@gmail.com')->send(new UserRegisterMail($data));
    //     return 'Mail Sent';
    // }
}
