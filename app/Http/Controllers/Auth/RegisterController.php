<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\SessionRegis;
use App\User;
use App\Form;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $date=SessionRegis::all();
        if(strtotime(now())<=strtotime($date[0]->end_date)){
            $data['session_regis'] = $date[0]->name;
        }else if(strtotime(now())<=strtotime($date[1]->end_date)){
            $data['session_regis'] = $date[1]->name;
        }else if(strtotime(now())<=strtotime($date[2]->end_date)){
            $data['session_regis'] = $date[2]->name;
        }else{
            $data['session_regis'] = 'gk jelas elu pendaftaran udah di tutup';
        }

        return User::create([
            'name' => $data['name'],
            'role_id' => '2',
            'session_regis'=>$data['session_regis'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered()
    {
        $this->guard()->logout();
        return redirect()->route('login')->with('success','Selamat bergabung, silahkan login ...');
    }
}
