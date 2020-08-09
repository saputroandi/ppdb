<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use JWTAuth;
use App\Document;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function showDocument($idUser)
    {
        $document = Document::where('user_id', $idUser)->first();
        $user = $this->user;

        if(isset($document->user_id)==true){
            if($this->user->id == $document->user_id){
                return response()->json([
                    'status' => 200,
                    'user'   => $user,
                    'document'   => $document,
                ]);
            }else{
                return response()->json([
                    'status'  => 403,
                    'message' => 'Forbidden',
                ],403);
            }
        }else{
            return response()->json([
                'status'  => 404,
                'message' => 'Document Not Found',
            ],404);
        }
        
    }

    public function storeDocument(DocumentRequest $request)
    {

        $document = new Document;
        $document = $request->all();
        $document['user_id'] = $this->user->id;

        $checkUser = Document::where('user_id', $this->user->id)->first();
        if(isset($checkUser->user_id)==true){
            return response()->json([
                'status'  => 400,
                'message' => 'You had uploaded Document',
            ],400);
        }

        if(Document::create($document)){
            return response()->json([
                'status' => 200,
                'user'   => $this->user,
                'document'   => $document,
            ]);
            } else {
            return response()->json([
                'status'  => false,
                'message' => 'Document could not be saved'
            ]);
        }
    }

    public function updateDocument(DocumentRequest $request,$idUser)
    {
        $document = Document::where('user_id', $idUser)->first();

        if(isset($document)){
            if($this->user->id !== $document->user_id){
                return response()->json([
                    'status'  => 403,
                    'message' => 'Forbidden',
                ],403);
            }
        }else{
            return response()->json([
                'status'  => 400,
                'message' => 'Not found',
            ],400);
        }

        $document->user_id        = $this->user->id;
        $document->img_semester_1 = $request->img_semester_1;
        $document->img_semester_2 = $request->img_semester_2;
        $document->img_semester_3 = $request->img_semester_3;
        $document->img_semester_4 = $request->img_semester_4;
        $document->img_semester_5 = $request->img_semester_5;
        $document->img_semester_6 = $request->img_semester_6;
        $document->img_skhun      = $request->img_akta;
        $document->img_akta       = $request->img_skhun;
        $document->img_kk         = $request->img_kk;

        if(isset($document)){
            if($document->save()){
                return response()->json([
                    'status'  => 200,
                    'user'    => $this->user,
                    'document'    => $document,
                    'message' => 'document updated'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Document could not be saved'
                ]);
            }
        }else{
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }
    }
}
