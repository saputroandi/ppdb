<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllSchedule()
    {
        if(auth()->user()->role_id == 1){
            $schedules = Schedule::all();
            return view('admin.schedule.index',['schedules'=>$schedules]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function inputSchedule()
    {
        if(auth()->user()->role_id == 1){
            return view('admin.schedule.input');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function storeSchedule(Request $request)
    {
        $this->validate($request,[
            'schedule_title' => 'required|string',
            'schedule_date' => 'required',
            'schedule_time' => 'required',
            'schedule_content' => 'required|string',
        ]);
        $schedule                   = new Schedule;
        $schedule->user_id          = auth()->user()->id;
        $schedule->schedule_title   = $request->schedule_title;
        $schedule->schedule_date    = $request->schedule_date;
        $schedule->schedule_time    = $request->schedule_time;
        $schedule->schedule_content = $request->schedule_content;
        $schedule->save();
        return redirect('/schedule/show')->with('success','New schedule has been added');
    }

    public function editSchedule($id)
    {
        if(auth()->user()->role_id == 1){
            $schedule = Schedule::find($id);
            return view('admin.schedule.edit',['schedule'=>$schedule]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function updateSchedule(Request $request,$id)
    {
        $this->validate($request,[
            'schedule_title' => 'required|string',
            'schedule_date' => 'required',
            'schedule_time' => 'required',
            'schedule_content' => 'required|string',
        ]);
        $schedule                   = Schedule::find($id);
        $schedule->schedule_title   = $request->schedule_title;
        $schedule->schedule_date    = $request->schedule_date;
        $schedule->schedule_time    = $request->schedule_time;
        $schedule->schedule_content = $request->schedule_content;
        $schedule->save();
        return redirect('/schedule/show')->with('success','New schedule has been updated');
    }

    public function deleteSchedule($id)
    {
        if(auth()->user()->role_id == 1){
            $schedule=Schedule::find($id);
            $schedule->delete();
            return redirect('/schedule/show')->with('success','Schedule has been deleted');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }
}
