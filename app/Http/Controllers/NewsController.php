<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use JWTAuth;
use App\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();

        if($this->user->role_id !== 1){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }
    }

    public function showAllNews()
    {
        $news = News::orderBy('id','DESC')->get();
        $user = $this->user;

        if(isset($news)==true){
                return response()->json([
                    'status' => 200,
                    'user'   => $user,
                    'document'   => $news,
                ]);
        }else{
            return response()->json([
                'status'  => 404,
                'message' => 'News Not Found',
            ],404);
        }
        
    }

    public function storeNews(NewsRequest $request)
    {
        $news = new News;
        $news = $request->all();
        $news['user_id'] = $this->user->id;

        if(News::create($news)){
            return response()->json([
                'status' => 200,
                'user'   => $this->user,
                'post'   => $news,
            ]);
            } else {
            return response()->json([
                'status'  => false,
                'message' => 'Post could not be saved'
            ]);
        }
    }

    public function updateNews(NewsRequest $request,$idNews)
    {
        $news               = News::where('id', $idNews)->first();
        $news->user_id      = $this->user->id;
        $news->post_title   = $request->post_title;
        $news->post_content = $request->post_content;


            if($news->save()){
                return response()->json([
                    'status'  => 200,
                    'user'    => $this->user,
                    'news'    => $news,
                    'message' => 'News updated'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'News could not be saved'
                ]);
            }
    }

    public function deleteNews($idNews)
    {
        $news = News::find($idNews);

            if($news->delete()){
                return response()->json([
                    'status'  => 200,
                    'user'    => $this->user,
                    'news'    => $news,
                    'message' => 'This news has been deleted'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'News could not be delete'
                ]);
            }
    }
}
