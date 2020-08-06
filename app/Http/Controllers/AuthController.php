<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\AuthRequest;
use Illuminate\Auth\SessionGuard;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only(['email','password']);
        $token       = JWTAuth::attempt($credentials);

        if(!$token){
            return response()->json([
                'status'  => false,
                'message' => 'Unauthorized'
            ],401);
        }

        return (new UserResource($request->user()))
            ->additional(['meta' => [
            'status' => true,
            'token'  => $token,
            ]]);
    }

    public function register(AuthRequest $request)
    {

        $user           = new User;
        $user->name     = $request->name;
        $user->role_id  = '2';
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $credentials = $request->only(['email','password']);
        $token       = JWTAuth::attempt($credentials);


        return (new UserResource($request->user()))
            ->additional(['meta' => [
            'status' => true,
            'token'  => $token,
            ]]);
    }

    public function logout(Request $request)
    {
        //user harus memasukan parameter token sebelum melakukan logout
        $this->validate($request,[
            'token' => 'required'
        ]);

        try{
            JWTAuth:: invalidate($request->token);

            return response()->json([
                'status'  => true,
                'message' => 'User logged out successfully'
            ]);
        }catch(JWTException $exception){
            return response()->json([
                'status'  => false,
                'message' => "User cannot be logged out"
            ]);
        }
    }
}
