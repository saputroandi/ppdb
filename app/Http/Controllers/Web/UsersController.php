<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllUser()
    {
        if(auth()->user()->role_id == 1){
            $users = User::all();
            return view('admin.user.index',['users'=>$users]);
        }else{
            return redirect('/user/show/'.auth()->user()->id);
        }
    }

    public function showUser($id)
    {
        $user = User::find($id);
        if (auth()->user()->id==$id){
            return view('admin.user.show',['user'=>$user]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function editProfil($id)
    {
        $user=User::find($id);
        if(auth()->user()->role_id == 2){
            if(auth()->user()->id==$id){
                return view('admin.user.edit',['user'=>$user]);
            }else{
                return redirect('/')->with('error','No authorization');
            }
        }else{
            return view('admin.user.edit',['user'=>$user]);
        }
    }

    public function updateProfil(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'password' => 'nullable|min:8|confirmed|string',
        ]);

        isset($request->picture)==true?$this->validate($request,['picture' => 'image|max:1999',]):null;

        $user=User::find($id);
        $user->name=$request->name;
        $user->password=isset($request->password) == true?Hash::make($request->password):$user->password;
        $user->picture=isset($request->picture) == true?base64_encode(file_get_contents($request->file('picture'))):$user->picture;
        $user->save();
        
        if(auth()->user()->role_id == 1){
            return redirect('/user/show')->with('success','Profile has been updated');
        }else{
            return redirect('/user/show/'.auth()->user()->id)->with('success','Your profile has been updated');
        }
    }
}
