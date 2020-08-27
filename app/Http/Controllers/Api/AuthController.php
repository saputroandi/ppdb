<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Http\Request;
use App\SessionRegis;
use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\AuthRequest;
use Illuminate\Auth\SessionGuard;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $messages=[
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min'      => 'Password minimal 8 karakter',
        ];
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ],$messages);

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

        $date=SessionRegis::all();
        if(strtotime(now())<=strtotime($date[0]->end_date)){
            $data = $date[0]->name;
        }else if(strtotime(now())<=strtotime($date[1]->end_date)){
            $data = $date[1]->name;
        }else if(strtotime(now())<=strtotime($date[2]->end_date)){
            $data = $date[2]->name;
        }else{
            $date = 'gk jelas elu pendaftaran udah di tutup';
        }

        $user                = new User;
        $user->name          = $request->name;
        $user->role_id       = '2';
        $user->session_regis = $data;
        $user->email         = $request->email;
        $user->password      = bcrypt($request->password);
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
