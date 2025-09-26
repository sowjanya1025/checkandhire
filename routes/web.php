<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;
use App\Models\User;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\FeedbackTitle;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('link', function () {

    Artisan::call('storage:link');

    dd("Cache is cleared");

});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/admin', 'HomeController@AdminLogin')->name('admin.login')->middleware('checkAdminUser');
Route::get('/admin-login', 'HomeController@AdminLogin')->name('admin.login')->middleware('checkAdminUser');
Route::get('/dashboard', 'Admin\IndexController@index')->name('admin.index')->middleware('auth')->middleware('checkAdmin');

Route::get('/', 'Web\HomeController@index')->name('web.index')->middleware('checkWebuser');
Route::post('get-employee', 'Web\HomeController@getEmployee');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'checkWebuser'], function(){
    
    Route::get('profile', 'Web\ProfileController@profile')->middleware('auth');
    Route::get('edit-profile', 'Web\ProfileController@editProfile')->middleware('auth');
    Route::post('update-my-profile', 'Web\ProfileController@updateMyProfile')->middleware('auth');
    Route::get('consume', 'Web\ProfileController@consume')->middleware('auth');
    Route::get('contribute', 'Web\ProfileController@contribute')->middleware('auth');
    Route::get('employee-profile/{id}', 'Web\ProfileController@employeeProfile')->middleware('auth');
    Route::get('registration', 'Web\RegisterController@index')->middleware('checkLogin');
    Route::post('registration', 'Web\RegisterController@register')->middleware('checkLogin');
    Route::get('sign-in', 'Web\RegisterController@signin')->middleware('checkLogin');
    Route::get('otp', 'Web\RegisterController@otp');
    Route::post('verify-otp', 'Web\RegisterController@verifyOtp');
    
    Route::get('feedback', 'Web\FeedbackController@index')->middleware('auth');
    Route::post('create-feedback', 'Web\FeedbackController@createFeedback')->middleware('auth');
    
    Route::post('search-employee', 'Web\HomeController@searchEmployee');
    
    Route::get('purchase-point', 'Web\PaymentController@PurchasePoint');
    Route::post('purchase-point', 'Web\PaymentController@payment');

});

Route::post('pay', 'Web\PaymentController@pay')->middleware('checkWebuser');
Route::get('pay', function(){
   return view('web/pay'); 
});

Route::get('forgot-password', 'Web\HomeController@forgotPassword');
Route::Post('forgot-password', 'Web\HomeController@SendLink');
Route::get('reset-password/{token}', 'Web\HomeController@resetPassword');
Route::post('reset-password', 'Web\HomeController@changePassword');
Route::post('reset-password', 'Web\HomeController@changePassword');

Route::get('contact', 'Web\HomeController@contact')->middleware('checkWebuser');
Route::post('contact', 'Web\HomeController@saveContact')->middleware('checkWebuser');

Route::get('test', 'Web\HomeController@test');






///////