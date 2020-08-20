<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
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
        
        if(auth()->user()->role_id == '2'){
            if(isset(auth()->user()->grade->user_id) == false){
                return redirect('/grade/input')->with('success','You have to create form first');
            }
            return redirect('/grade/show/'.auth()->user()->id);
        }

        $users = User::all();
        return view('admin.grades.index',['users'=>$users]);

    }

    public function showGrade($id)
    {
        if(auth()->user()->role_id == '2'){
            if(isset(auth()->user()->grade->user_id) == false){
                return redirect('/grade/input')->with('success','You have to create form first');
            } elseif (auth()->user()->id==$id) {
                $user = User::find($id);
                return view('admin.grades.show',['user'=>$user]);
            }else{
                return redirect('/')->with('error','No Authorization');
            }
        }else{
            $user = User::find($id);
            return view('admin.grades.show',['user'=>$user]);
        }
    }

    public function inputGrade()
    {
        $checkUser = Grade::where('user_id', auth()->user()->id)->first();
        if(isset($checkUser->user_id)==true){
            return redirect('/grade/show/'.auth()->user()->id)->with('success','You have input your grade before');
        }else{
            return view('admin.grades.input');
        }
    }

    public function storeGrade(GradeRequest $request)
    {
        $id        = auth()->user()->id;
        $checkUser = Grade::where('user_id', $id)->first();
        if(isset($checkUser->user_id)==true){
            return redirect('/grade/show/'.$id)->with('success','You have input your grade before');
        }else{
                   $grade     = new Grade;
                   $grade     = $request->all();
            $grade['average'] = ($grade['semester_1']+$grade['semester_2']+$grade['semester_3']+$grade['semester_4']+$grade['semester_5']+$grade['semester_6'])/6;
            $grade['user_id'] = $id;
            Grade:: create($grade);
            return redirect('/grade/show/'.$id)->with('success','Congratulation you have input your grades'); 
        }
    }

    public function editGrade($id)
    {
        $user=User::find($id);

        if(auth()->user()->role_id == '2'){
            if(auth()->user()->id==$id){
                if(isset($user->grade->semester_1)==false){
                    return redirect('/grade/input')->with('success','You have input your grade before');
                }else{
                    return view('admin.grades.edit',['user'=>$user]);
                }
            }else{
                return redirect('/')->with('error','No Authorization');
            }
        }else{
            return view('admin.grades.edit',['user'=>$user]);
        }
    }

    public function updateGrade(GradeRequest $request,$id)
    {
        $idUser=auth()->user()->id;
        if(auth()->user()->role_id == '2'){
            if($idUser==$id){
                $grade             = Grade::where('user_id', $idUser)->first();
                $grade->semester_1 = $request->semester_1;
                $grade->semester_2 = $request->semester_2;
                $grade->semester_3 = $request->semester_3;
                $grade->semester_4 = $request->semester_4;
                $grade->semester_5 = $request->semester_5;
                $grade->semester_6 = $request->semester_6;
                $grade->average    = ($request->semester_1+$request->semester_2+$request->semester_3+$request->semester_4+$request->semester_5+$request->semester_6)/6;
                $grade->save();
                return redirect('/grade/show/'.$idUser)->with('success','Congratulation you have update your grades'); 
            }
        }else{
            $grade             = Grade::where('user_id', $id)->first();
            $grade->semester_1 = $request->semester_1;
            $grade->semester_2 = $request->semester_2;
            $grade->semester_3 = $request->semester_3;
            $grade->semester_4 = $request->semester_4;
            $grade->semester_5 = $request->semester_5;
            $grade->semester_6 = $request->semester_6;
            $grade->average    = ($request->semester_1+$request->semester_2+$request->semester_3+$request->semester_4+$request->semester_5+$request->semester_6)/6;
            $grade->save();
            $users = User::all();
            return view('admin.grades.index',['users'=>$users])->with('success','Congratulation you have update your grades');
        }
    }
}
