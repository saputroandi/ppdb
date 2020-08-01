<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request)
    {
        $credentials=$request->only('email','password');
        $token=null;

        if(!$token=JWTAuth::attempt($credentials)){
            return response()->json([
                'status'=>false,
                'message'=>'Unauthorized'
            ]);
        }
    }

    public function register(AuthRequest $request)
    {

        $user=new User;
        $user->name=$request->name;
        $user->role_id='2';
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();

        // if($this->loginAfterSignUp){
        //     return $this->login($request);
        // }
        $credentials=$request->only('email','password');
        $token=null;

        if(!$token){
            $token=JWTAuth::attempt($credentials);
            return (new UserResource($request->user()))
                ->additional(['meta' => [
                    'token' => $token,
                ]]);
        }

        return new UserResource($user);
    }

    public function logout(Request $request)
    {
        //user harus memasukan parameter token sebelum melakukan logout
        $this->validate($request,[
            'token'=>'required'
        ]);

        try{
            JWTAuth::invalidate($request->token);

            return response()->json([
                'status'=>true,
                'message'=>'User logged out successfully'
            ]);
        }catch(JWTException $exception){
            return response()->json([
                'status'=>false,
                'message'=>"User cannot be logged out"
            ]);
        }
    }
}
