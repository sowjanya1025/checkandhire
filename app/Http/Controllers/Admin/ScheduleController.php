<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Redirect,Response;

class ScheduleController extends Controller
{
    public function index()
    {
        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Schedule::where('user_id', auth()->id())->whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }
        return view('admin.schedule.index');
    }
    
   
    public function create(Request $request)
    {  
        $insertArr = [ 'user_id' => auth()->id(),
                       'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end
                    ];
        $event = Schedule::insert($insertArr);   
        return Response::json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id, 'user_id' => auth()->id());
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Schedule::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = Schedule::where('id',$request->id)->where('user_id', auth()->id())->delete();
   
        return Response::json($event);
    }
}
