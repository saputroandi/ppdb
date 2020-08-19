<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Grade;
use App\User;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showAllGrade()
    {
        if(isset(auth()->user()->grade->user_id) == false){
            return redirect('/')->with('success','You have to create form first');
        }

        if(auth()->user()->role_id == '2'){
            return redirect('/grade/show/'.auth()->user()->id);
        }

        $users=User::all();
        return view('admin.grades.index',['users'=>$users]);

    }

    public function showGrade()
    {
        echo 'jancuk';
    }

    public function editGrade()
    {
        echo 'jancuk edit';
    }

    public function inputGrade()
    {
        echo 'jancuk input';
    }










    public function deleteGrade()
    {
        echo 'jancuk delete';
    }
}
