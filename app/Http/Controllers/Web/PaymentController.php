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
use App\Mail\sendPdf;
use Illuminate\Support\Facades\Mail;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use Storage;


class PaymentController extends Controller
{
    public function PurchasePoint(){
        return view('website.payment.purchase-point');
    }
    public function payment(Request $request){
        return back();
    }
}
