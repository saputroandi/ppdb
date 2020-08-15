<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use JWTAuth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function showUser($idUser)
    {
        $user = User::find($idUser);

        if(isset($user->id)==true){
            if($this->user->id == $user->id){
                return response()->json([
                    'status' => 200,
                    'user'   => $user,
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
                'message' => 'Not found',
            ],404);
        }
    }

    public function updateUser(Request $request,$idUser)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $user = User::find($idUser);

        if($this->user->id !== $user->id){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }

        $user->name  = $request->name;


            if($user->save()){
                return response()->json([
                    'status'  => 200,
                    'user'    => $user,
                    'message' => 'User updated'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'User could not be saved'
                ]);
            }
        
    }

    public function updatePass(Request $request,$idUser)
    {
        $request->validate([
            'password' => 'required|string|min:8',
        ]);

        $user = User::find($idUser);

        if($this->user->id !== $user->id){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }
        
        $user->password=Hash::make($request['password']);

        if($user->save()){
            return response()->json([
                'status'  => true,
                'user'    => $user,
                'message' => 'User updated'
            ]);
            } else {
            return response()->json([
                'status'  => false,
                'message' => 'User could not be saved'
            ]);
        }
    }

}
