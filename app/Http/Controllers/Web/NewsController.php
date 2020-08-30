<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllNews()
    {
        if(auth()->user()->role_id == 1){
            $news = News::all();
            return view('admin.major_interest.index',['news'=>$news]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }
}
