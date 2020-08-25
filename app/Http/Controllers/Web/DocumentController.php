<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use Illuminate\Http\Request;
use App\Document;
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

    public function showDocument($id)
    {
        $user = User::find($id);
        if(isset($user->document->user_id)==true){
            if(auth()->user()->role_id == '2'){
                if (auth()->user()->id==$id) {
                    return view('admin.documents.show',['user'=>$user]);
                }else{
                    return redirect('/')->with('error','No Authorization');
                }
            }else{
                return view('admin.documents.show',['user'=>$user]);
            }
        }else{
            return redirect('/')->with('error','Not Found');
        }
    }

    public function inputDocument()
    {
        $checkUser = Document::where('user_id', auth()->user()->id)->first();
        if(auth()->user()->role_id == 2){
            if(isset($checkUser->user_id)==true){
                return redirect('/document/show/'.auth()->user()->id)->with('success','You have input your document before');
            }else{
                return view('admin.documents.input');
            }
        }else{
            return view('admin.documents.input');
        }
    }

    public function storeDocument(DocumentRequest $request)
    {
        // ini_set('memory_limit','256M');
        $id        = auth()->user()->id;
        $checkUser = Document::where('user_id', $id)->first();
        
        if(isset($checkUser->user_id)==true){
            return redirect('/document/show/'.$id)->with('success','You have input your document before');
        }else{
            $document                 = new Document;
            $document->user_id        = $id;
            $document->img_semester_1 = base64_encode(file_get_contents($request->file('img_semester_1')));
            $document->img_semester_2 = base64_encode(file_get_contents($request->file('img_semester_2')));
            $document->img_semester_3 = base64_encode(file_get_contents($request->file('img_semester_3')));
            $document->img_semester_4 = base64_encode(file_get_contents($request->file('img_semester_4')));
            $document->img_semester_5 = base64_encode(file_get_contents($request->file('img_semester_5')));
            $document->img_semester_6 = base64_encode(file_get_contents($request->file('img_semester_6')));
            $document->img_skhun      = base64_encode(file_get_contents($request->file('img_skhun')));
            $document->img_akta       = base64_encode(file_get_contents($request->file('img_akta')));
            $document->img_kk         = base64_encode(file_get_contents($request->file('img_kk')));
            $document->save();
            return redirect('/document/show/'.$id)->with('success','Congratulation you have input your document'); 
        }
    }

    public function editDocument($id)
    {
        $user=User::find($id);

        if(auth()->user()->role_id == '2'){
            if(auth()->user()->id==$id){
                if(isset($user->document->user_id)==false){
                    return redirect('/document/input')->with('success','You have upload your document before');
                }else{
                    return view('admin.documents.edit',['user'=>$user]);
                }
            }else{
                return redirect('/')->with('error','No Authorization');
            }
        }else{
            return view('admin.documents.edit',['user'=>$user]);
        }
    }

    public function updateDocument(DocumentRequest $request,$id)
    {
        dd($request,$id);
    }
}
