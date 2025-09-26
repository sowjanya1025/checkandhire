<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\FeedbackTitle;
use App\Models\MyConsume;
use App\Mail\sendPdf;
use Illuminate\Support\Facades\Mail;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function Profile(){
        $user_col = DB::getSchemaBuilder()->getColumnListing('users');
        $data = User::where('id', auth()->id())->first();
        return view('website.profile.edit-recruiter-profile', compact('data', 'user_col'));
    }
   public function editProfile(){
        $user_col = DB::getSchemaBuilder()->getColumnListing('users');
        $data = User::where('id', auth()->id())->first();
        return view('website.profile.edit-recruiter-profile', compact('data', 'user_col'));
    }
    public function updateMyProfileold(Request $request){
         $data = request()->validate([
            'email'=>'required|unique:users,email,'.auth()->id()
        ]);          
        $user = User::find(auth()->id());
        foreach($request->all() as $key => $item){
          //  echo $key;
          //  echo "<br>";
          //  echo $item;
          //  echo "<br>";
            if($key != 'email' && $key != 'password' && $key != '_token' && $key != 'password_confirmation'){
                echo "inside";
                echo "<br>";
                echo $key;
                echo "<br>";
                echo $item;
                echo "<br>";
                if($key != 'image' && $key != 'aadhar_document' && $key != 'pancard_document'){
                   $user->$key = $item;      
                }else{
                     if(!empty($request->file('image')))
                        {           
                           // $imageName = url('/').'/public/images/recruiter/'.time().'.'.$request->file('image')->extension();
                            $imageName = time().'.'.$request->file('image')->extension();
                            $request->image->move(public_path('images/recruiter/'), $imageName);            
                            $user->image = $imageName;  
                            echo $imageName;    
                        }
                        elseif(!empty($request->file('aadhar_document')))
                        {           
                           // $imageName = url('/').'/public/images/recruiter/'.time().'.'.$request->file('image')->extension();
                          // echo "inside"; exit;
                            $aadhar_document = "adhar_".time().'.'.$request->file('aadhar_document')->extension();
                            $request->aadhar_document->move(public_path('images/recruiter/documents/'), $aadhar_document);            
                            $user->aadhar_document = $aadhar_document;  
                            echo $aadhar_document;    
                        }
                        elseif(!empty($request->file('pancard_document')))
                        {           
                           // $imageName = url('/').'/public/images/recruiter/'.time().'.$request->file('image')->extension();
                            $pancard_document = "pan_".time().'.'.$request->file('pancard_document')->extension();
                            $request->pancard_document->move(public_path('images/recruiter/documents/'), $pancard_document);            
                            $user->pancard_document = $pancard_document;  
                            echo $pancard_document;    
                        }
                }
            }
            
        }// echo "==================";dd($user);exit;
        $user->email = $request->email;
        $user->role = 'Recruiter';
       
        if(!empty($request->password)){
          //  $data1 = request()->validate([
          //  'password'=>'required|confirmed|min:6'
       // ]);          
         $user->password = Hash::make($request->password);   
        }
         $user->save();
        //dd($user->getChanges());
        //exit;
        return redirect('/')->with('success', 'Profile updated successfully');
    }

    public function updateMyProfile(Request $request)
{
    $data = $request->validate([
        'email' => 'required|unique:users,email,' . auth()->id(),
    ]);

    $user = User::findOrFail(auth()->id());

    // Handle non-file fields (except email, password)
    foreach ($request->except(['email', 'password', 'password_confirmation', '_token', 'image', 'aadhar_document', 'pancard_document']) as $key => $value) {
        $user->$key = $value;
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images/recruiter/'), $imageName);
        $user->image = $imageName;
    }

    // Handle Aadhar upload
    if ($request->hasFile('aadhar_document')) {
        $aadhar_document = 'adhar_' . time() . '.' . $request->file('aadhar_document')->extension();
        $request->file('aadhar_document')->move(public_path('images/recruiter/documents/'), $aadhar_document);
        $user->aadhar_document = $aadhar_document;
    }

    // Handle Pancard upload
    if ($request->hasFile('pancard_document')) {
        $pancard_document = 'pan_' . time() . '.' . $request->file('pancard_document')->extension();
        $request->file('pancard_document')->move(public_path('images/recruiter/documents/'), $pancard_document);
        $user->pancard_document = $pancard_document;
    }

    // Email
    $user->email = $request->email;
    $user->role = 'Recruiter';

    // Password
    if (!empty($request->password)) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect('/')->with('success', 'Profile updated successfully');
}


    public function employeeProfile($id){
        if(auth()->user()->consume == 0){
          return redirect('purchase-point')->with('failed', 'You do not have sufficient consume points!');
        }
        $user = User::find(auth()->id());
        $user->consume = $user->consume - 1;
        $user->save();
        
        $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        $feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
        $emp = Employee::where('id', $id)->first();
        $feed = Feedback::where('user_id', $id)->orderByDESC('id')->get();
        $title = FeedbackTitle::get();
        $name = str_replace(' ', '_', $emp->name);
        $data = Employee::where('id', $id)->first();
        $feed = Feedback::where('user_id', $id)->get();
        $pdf = PDF::loadView('web.pdf.index', compact('data', 'feed', 'feed_column', 'emp_column'));
        Storage::put('public/pdf/'.$name.'.pdf', $pdf->output());
        $path = asset('storage/pdf/'.$name.'.pdf');
        Mail::to(auth()->user()->email)->send(new sendPdf($path));
        session()->flash('success', 'Please check!  Employee details has been sent on your registered email.');
        $add_consume_record = new MyConsume;
        $add_consume_record->user_id = auth()->id();
        $add_consume_record->employee_id = $id;
        $add_consume_record->save(); 
        return view('website.profile.employee-profile', compact('emp', 'feed', 'title', 'feed_column', 'emp_column'));
    }
    
    public function consume(){
        $data = MyConsume::where('user_id', auth()->id())->orderByDESC('id')->paginate(10);
        return view('website.profile.consume', compact('data'));
    }
    public function contribute(){
        $feed_column = DB::getSchemaBuilder()->getColumnListing('feedbacks');
        $emp_column = DB::getSchemaBuilder()->getColumnListing('employee');
        $data = Feedback::where('recruiter_id', auth()->id())->orderByDESC('id')->paginate(10);
        return view('website.profile.contribute', compact('feed_column', 'emp_column', 'data'));
    }
}
