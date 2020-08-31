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
            return view('admin.news.index',['news'=>$news]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function inputNews()
    {
        if(auth()->user()->role_id == 1){
            return view('admin.news.input');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function storeNews(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
        $news=new News;
        $news->user_id=auth()->user()->id;
        $news->post_title=$request->title;
        $news->post_content=$request->content;
        $news->save();
        return redirect('/news/show')->with('success','News has been added');
    }

    public function editNews($id)
    {
        if(auth()->user()->role_id == 1){
            $news = News::find($id);
            return view('admin.news.edit',['news'=>$news]);
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }

    public function updateNews(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
        $news=News::find($id);
        $news->post_title=$request->title;
        $news->post_content=$request->content;
        $news->save();
        return redirect('/news/show')->with('success','News has been updated');
    }

    public function deleteNews($id)
    {
        if(auth()->user()->role_id == 1){
            $news=News::find($id);
            $news->delete();
            return redirect('/news/show')->with('success','News has been deleted');
        }else{
            return redirect('/')->with('error','No authorization');
        }
    }
}
