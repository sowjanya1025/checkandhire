<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\Otp;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Models\Employee;
use App\Models\Feedback;
use Illuminate\Support\Facades\Schema;
use App\Models\ColumnControl;


class ColumnController extends Controller
{
    public function employeeColumn(){
        $data = DB::getSchemaBuilder()->getColumnListing('employee');
        return view('job.column.employee', compact('data'));
    }
    
    public function createEmployeeColumn(Request $request){
        $col = str_replace(' ', '_', $request->column_name);
        Schema::table('employee', function($table) use ($col)
            {                                                
                $table->string($col)->nullable();
            }
        );    
        return back()->with('success', 'Column created successfully!');
    }
    
    public function deleteEmployeeColumn($column){
        Schema::table('employee', function ($table) use ($column) {
            $table->dropColumn($column);
        });
        return back()->with('success', 'Column deleted successfully!');
    }
    
    public function updateEmployeeColumn(Request $request){
        $old_column_name = str_replace(' ', '_', $request->old_column_name);
        $column_name = str_replace(' ', '_', $request->column_name);
        Schema::table('employee', function($table) use($old_column_name, $column_name)
            {
                $table->renameColumn($old_column_name, $column_name);
            }
        );   
        return back()->with('success', 'Column updated successfully!');
    }
    
    public function feedbackColumn(){
        $data = DB::getSchemaBuilder()->getColumnListing('feedbacks');
        return view('job.column.feedback', compact('data'));
    }
    
    public function createFeedbackColumn(Request $request){
        $col = str_replace(' ', '_', $request->column_name);
        Schema::table('feedbacks', function($table) use ($col)
            {                                                
                $table->string($col)->nullable();
            }
        );    
        return back()->with('success', 'Column created successfully!');;
    }
    
    public function deleteFeedbackColumn($column){
        Schema::table('feedbacks', function ($table) use ($column) {
            $table->dropColumn($column);
        });
        return back()->with('success', 'Column deleted successfully!');
    }
    
    public function updateFeedbackColumn(Request $request){
       
        $old_column_name = str_replace(' ', '_', $request->old_column_name);
        $column_name = str_replace(' ', '_', $request->column_name);
        Schema::table('feedbacks', function($table) use($old_column_name, $column_name)
            {
                $table->renameColumn($old_column_name, $column_name);
            }
        );
        return back();
    }
    
     public function registerColumn(){
        $data = DB::getSchemaBuilder()->getColumnListing('users');
        return view('job.column.register', compact('data'));
    }
    
    public function createRegisterColumn(Request $request){
        $col = str_replace(' ', '_', $request->column_name);
        Schema::table('users', function($table) use ($col)
            {                                                
                $table->string($col)->nullable();
            }
        );    
        return back()->with('success', 'Column created successfully!');
    }
    
    public function deleteRegisterColumn($column){
        Schema::table('users', function ($table) use ($column) {
            $table->dropColumn($column);
        });
        return back()->with('success', 'Column deleted successfully!');
    }
    
    public function updateRegisterColumn(Request $request){
        $old_column_name = str_replace(' ', '_', $request->old_column_name);
        $column_name = str_replace(' ', '_', $request->column_name);
        Schema::table('users', function($table) use($old_column_name, $column_name)
            {
                $table->renameColumn($old_column_name, $column_name);
            }
        );   
        return back()->with('success', 'Column updated successfully!');
    }
}
