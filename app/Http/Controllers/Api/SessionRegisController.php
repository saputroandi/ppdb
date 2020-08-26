<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SessionRegis;
use App\User;
use JWTAuth;

class SessionRegisController extends Controller
{
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function sessionRegis($id)
    {
        $user=User::find($id);
        $date=$user->created_at;
        // dd(strtotime($date));
        if(strtotime($date)<strtotime('2020/08/20')){
            echo 'lau gelombang 1';
        }else if(strtotime($date)<strtotime('2020/09/20')){
            echo 'lau gelombang 2';
        }else if(strtotime($date)<strtotime('2020/10/20')){
            echo 'lau gelombang 3';
        }else{
            echo 'gk jelas elu pendaftaran udah di tutup';
        }
    }
}
