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
        
        if(auth()->user()->role_id == 2){
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
            if(auth()->user()->role_id = 2){
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
        if(isset($checkUser->user_id)==true){
            return redirect('/document/show/'.auth()->user()->id)->with('success','You have input your document before');
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

        if(auth()->user()->role_id == 2){
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

    public function updateDocument(Request $request,$id)
    {
        $document=Document::where('user_id',$id)->first();
        isset($request->img_semester_1)==true?$this->validate($request,['img_semester_1' => 'required|image|max:1999',]):null;
        isset($request->img_semester_2)==true?$this->validate($request,['img_semester_2' => 'required|image|max:1999',]):null;
        isset($request->img_semester_3)==true?$this->validate($request,['img_semester_3' => 'required|image|max:1999',]):null;
        isset($request->img_semester_4)==true?$this->validate($request,['img_semester_4' => 'required|image|max:1999',]):null;
        isset($request->img_semester_5)==true?$this->validate($request,['img_semester_5' => 'required|image|max:1999',]):null;
        isset($request->img_semester_6)==true?$this->validate($request,['img_semester_6' => 'required|image|max:1999',]):null;
        isset($request->img_skhun)     ==true?$this->validate($request,['img_skhun'      => 'required|image|max:1999',]):null;
        isset($request->img_akta)      ==true?$this->validate($request,['img_akta'       => 'required|image|max:1999',]):null;
        isset($request->img_kk)        ==true?$this->validate($request,['img_kk'         => 'required|image|max:1999',]):null;


        $document->img_semester_1=isset($request->img_semester_1)==true?base64_encode(file_get_contents($request->file('img_semester_1'))):$document->img_semester_1;
        $document->img_semester_2=isset($request->img_semester_2)==true?base64_encode(file_get_contents($request->file('img_semester_2'))):$document->img_semester_2;
        $document->img_semester_3=isset($request->img_semester_3)==true?base64_encode(file_get_contents($request->file('img_semester_3'))):$document->img_semester_3;
        $document->img_semester_4=isset($request->img_semester_4)==true?base64_encode(file_get_contents($request->file('img_semester_4'))):$document->img_semester_4;
        $document->img_semester_5=isset($request->img_semester_5)==true?base64_encode(file_get_contents($request->file('img_semester_5'))):$document->img_semester_5;
        $document->img_semester_6=isset($request->img_semester_6)==true?base64_encode(file_get_contents($request->file('img_semester_6'))):$document->img_semester_6;
        $document->img_skhun     =isset($request->img_skhun)     ==true?base64_encode(file_get_contents($request->file('img_skhun')))     :$document->img_skhun;
        $document->img_akta      =isset($request->img_akta)      ==true?base64_encode(file_get_contents($request->file('img_akta')))      :$document->img_akta;
        $document->img_kk        =isset($request->img_kk)        ==true?base64_encode(file_get_contents($request->file('img_kk')))        :$document->img_kk;
        $document->save();
        
        return redirect('/document/show/'.$id)->with('success','Congratulation you have updated your document');

    }
}
