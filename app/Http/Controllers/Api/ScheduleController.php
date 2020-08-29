<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use JWTAuth;
use App\Schedule;


class ScheduleController extends Controller
{
    public function showAllSchedule()
    {
        $schedule = Schedule::orderBy('id','DESC')->get();

        if(isset($schedule)==true){
                return response()->json([
                    'status'   => 200,
                    'document' => $schedule,
                ]);
        }else{
            return response()->json([
                'status'  => 404,
                'message' => 'Schedule Not Found',
            ],404);
        }
        
    }

    public function storeSchedule(ScheduleRequest $request)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
                  $schedule  = new Schedule;
                  $schedule  = $request->all();
        $schedule['user_id'] = $this->user->id;

        if($this->user->role_id != 1){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }

        if(Schedule::create($schedule)){
            return response()->json([
                'status'   => 200,
                'user'     => $this->user,
                'schedule' => $schedule,
            ]);
            } else {
            return response()->json([
                'status'  => false,
                'message' => 'Schedule could not be saved'
            ]);
        }
    }

    public function updateSchedule(ScheduleRequest $request,$idSchedule)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $schedule                   = Schedule::where('id', $idSchedule)->first();

        if($this->user->role_id != 1){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }

        if(isset($schedule)==false){
            return response()->json([
                'status'  => 400,
                'message' => 'Not found',
            ],400);
        }

        $schedule->user_id          = $this->user->id;
        $schedule->schedule_title   = $request->schedule_title;
        $schedule->schedule_date    = $request->schedule_date;
        $schedule->schedule_time    = $request->schedule_time;
        $schedule->schedule_content = $request->schedule_content;


            if($schedule->save()){
                return response()->json([
                    'status'   => 200,
                    'user'     => $this->user,
                    'schedule' => $schedule,
                    'message'  => 'Schedule updated'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Schedule could not be saved'
                ]);
            }
    }

    public function deleteSchedule($idSchedule)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $schedule = Schedule::find($idSchedule);

        if($this->user->role_id != 1){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }

        if(isset($schedule)==false){
            return response()->json([
                'status'  => 400,
                'message' => 'Not found',
            ],400);
        }

            if($schedule->delete()){
                return response()->json([
                    'status'   => 200,
                    'user'     => $this->user,
                    'schedule' => $schedule,
                    'message'  => 'This schedule has been deleted'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Schedule could not be delete'
                ]);
            }
    }
}
