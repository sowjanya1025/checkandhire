<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function(){

    });    

Route::group(['middleware' => 'checkAdmin'], function(){

    Route::post('check-email', 'CommonController@checkEmail');
    
        
    Route::get('manage-employee-column', 'ColumnController@employeeColumn');
    Route::post('create-employee-column', 'ColumnController@createEmployeeColumn');
    Route::get('delete-employee-column/{column}', 'ColumnController@deleteEmployeeColumn');
    Route::post('update-employee-column', 'ColumnController@updateEmployeeColumn');
    
    Route::get('manage-feedback-column', 'ColumnController@feedbackColumn');
    Route::post('create-feedback-column', 'ColumnController@createFeedbackColumn');
    Route::get('delete-feedback-column/{column}', 'ColumnController@deleteFeedbackColumn');
    Route::post('update-feedback-column', 'ColumnController@updateFeedbackColumn');
    
    Route::get('manage-register-column', 'ColumnController@registerColumn');
    Route::post('create-register-column', 'ColumnController@createRegisterColumn');
    Route::get('delete-register-column/{column}', 'ColumnController@deleteRegisterColumn');
    Route::post('update-register-column', 'ColumnController@updateRegisterColumn');
    
    Route::get('feedback-title', 'CommonController@feedbackTitle');
    Route::post('create-feedback-title', 'CommonController@createFeedbackTitle');
    Route::get('delete-feedback-title/{id}', 'CommonController@deleteFeedbackTitle');
    Route::post('update-feedback-title', 'CommonController@updateFeedbackTitle');
    
    
    Route::get('recruiter', 'RecruiterController@index');
    Route::get('add-recruiter', 'RecruiterController@addRecruiter');
    Route::post('create-recruiter', 'RecruiterController@createRecruiter');
    Route::get('edit-recruiter/{id}', 'RecruiterController@editRecruiter');
    Route::post('update-recruiter', 'RecruiterController@updateRecruiter');
    Route::get('delete-recruiter/{id}', 'RecruiterController@deleteRecruiter');
    
    Route::get('teacher', 'TeacherController@index');
    Route::post('create-teacher', 'TeacherController@create');
    Route::post('update-teacher', 'TeacherController@update');
    Route::get('delete-teacher/{id}', 'TeacherController@delete');
    
    Route::get('employee', 'EmployeeController@index');
    Route::get('add-employee', 'EmployeeController@addEmployee');
    Route::get('edit-employee/{id}', 'EmployeeController@editEmployee');
    Route::post('create-employee', 'EmployeeController@createEmployee');
    Route::post('update-employee', 'EmployeeController@updateEmployee');
    Route::get('delete-employee/{id}', 'EmployeeController@deleteEmployee');
    
    Route::get('view-feedback/{id}', 'EmployeeController@viewFeedback');
    Route::post('create-employee-feedback', 'EmployeeController@createEmployeeFeedback');
    Route::post('get-feedback-form', 'EmployeeController@getFeedbackForm');
    Route::post('update-employee-feedback', 'EmployeeController@updateEmployeeFeedback');
    Route::get('delete-employee-feedback/{id}', 'EmployeeController@deleteEmployeeFeedback');
    
    Route::get('/change-password', 'SettingController@changePassword');
    Route::post('/update-password', 'SettingController@updatePassword');
    
    Route::get('/contact-list', 'IndexController@contact');

});    
