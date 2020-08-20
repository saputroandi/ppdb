<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showAllDocument()
    {
        
        if(auth()->user()->role_id == '2'){
            if(isset(auth()->user()->document->user_id) == false){
                return redirect('/document/input')->with('success','You have to upload document first');
            }
            return redirect('/document/show/'.auth()->user()->id);
        }else{
            $users = User::all();
            return view('admin.documents.index',['users'=>$users]);
        }
    }
}
