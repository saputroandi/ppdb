<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;
use JWTAuth;
use App\Grade;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function showGrade($idUser)
    {
        $grade = Grade::where('user_id', $idUser)->first();
        $user = $this->user;

        if(isset($grade->user_id)==true){
            if($this->user->id == $grade->user_id){
                return response()->json([
                    'status' => 200,
                    'user'   => $user,
                    'grade'   => $grade,
                ]);
            }else{
                return response()->json([
                    'status'  => 403,
                    'message' => 'Forbidden',
                ],403);
            }
        }else{
            return response()->json([
                'status'  => 404,
                'message' => 'Grade Not Found',
            ],404);
        }
        
    }

    public function storeGrade(GradeRequest $request)
    {

        $grade = new Grade;
        $grade = $request->all();
        $grade['average']=($grade['semester_1']+$grade['semester_2']+$grade['semester_3']+$grade['semester_4']+$grade['semester_5']+$grade['semester_6'])/6;
        $grade['user_id'] = $this->user->id;

        $checkUser = Grade::where('user_id', $this->user->id)->first();
        if(isset($checkUser->user_id)==true){
            return response()->json([
                'status'  => 400,
                'message' => 'You had inserted grade',
            ],400);
        }

        if(Grade::create($grade)){
            return response()->json([
                'status' => 200,
                'user'   => $this->user,
                'grade'   => $grade,
            ]);
            } else {
            return response()->json([
                'status'  => false,
                'message' => 'Form could not be saved'
            ]);
        }
    }

    public function updateGrade(GradeRequest $request,$idUser)
    {
        $grade = Grade::where('user_id', $idUser)->first();

        if($this->user->id !== $grade->user_id){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }

        $grade->user_id    = $this->user->id;
        $grade->semester_1 = $request->semester_1;
        $grade->semester_2 = $request->semester_2;
        $grade->semester_3 = $request->semester_3;
        $grade->semester_4 = $request->semester_4;
        $grade->semester_5 = $request->semester_5;
        $grade->semester_6 = $request->semester_6;
        $grade->average    = ($grade->semester_1+$grade->semester_2+$grade->semester_3+$grade->semester_4+$grade->semester_5+$grade->semester_6)/6;

        if(isset($grade)){
            if($grade->save()){
                return response()->json([
                    'status'  => 200,
                    'user'    => $this->user,
                    'grade'    => $grade,
                    'message' => 'Grade updated'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Grade could not be saved'
                ]);
            }
        }else{
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }
    }
}
