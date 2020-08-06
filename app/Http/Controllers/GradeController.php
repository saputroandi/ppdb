<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\GradeRequest;
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
                'message' => 'Form Not Found',
            ],404);
        }
        
    }

    public function storeGrade(GradeRequest $request)
    {

        $grade = new Grade;
        $grade = $request->all();
        $grade['user_id'] = $this->user->id;

        $checkUser = Form::where('user_id', $this->user->id)->get();
        if(isset($checkUser[0]->user_id)==true){
            return response()->json([
                'status'  => false,
                'message' => 'You have created form',
            ],400);
        }

        if(Form::create($form)){
            return response()->json([
                'status' => true,
                'user'   => $this->user,
                'form'   => $form,
            ]);
            } else {
            return response()->json([
                'status'  => false,
                'message' => 'Form could not be saved'
            ]);
        }
    }
}
