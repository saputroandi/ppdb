<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MajorInterest;

class MajorInterestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllInterest()
    {
        if(auth()->user()->role_id == 1){
            $interests = MajorInterest::all();
            return view('admin.major_interest.index',['interests'=>$interests]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function inputInterest()
    {
        if(auth()->user()->role_id == 1){
            return view('admin.major_interest.input');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function storeInterest(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $interest=new MajorInterest;
        $interest->name=$request->name;
        $interest->save();
        return redirect('/interest/show')->with('success','Major interest name has been added');
    }

    public function editInterest($id)
    {
        if(auth()->user()->role_id == 1){
            $interest = MajorInterest::find($id);
            return view('admin.major_interest.edit',['interest'=>$interest]);
        }else{
            return view('/')->with('error','No authorization');
        }
    }

    public function updateInterest(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $interest=MajorInterest::find($id);
        $interest->name=$request->name;
        $interest->save();
        return redirect('/interest/show')->with('success','Major interest name has been updated');
    }

    public function deleteInterest($id)
    {
        if(auth()->user()->role_id == 1){
            $interest=MajorInterest::find($id);
            $interest->delete();
            return redirect('/interest/show')->with('success','Major interest name has been deleted');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }
}
