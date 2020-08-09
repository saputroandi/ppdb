<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\MajorInterest;

class MajorInterestController extends Controller
{

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function showAllInterest()
    {
        $interest = MajorInterest::all();
        $user     = $this->user;

        if(isset($interest)==true){
                return response()->json([
                    'status'   => 200,
                    'user'     => $user,
                    'interest' => $interest,
                ]);
        }else{
            return response()->json([
                'status'  => 404,
                'message' => 'Major interest Not Found',
            ],404);
        }
        
    }

    public function storeInterest(Request $request)
    {
        $data = request()->validate([
            'name' => 'required'
        ]);

        $interest = new MajorInterest;
        $interest = $request->all();

        if($this->user->role_id !== 1){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }

        if(MajorInterest::create($interest)){
            return response()->json([
                'status' => 200,
                'user'   => $this->user,
                'interest'   => $interest,
            ]);
            } else {
            return response()->json([
                'status'  => false,
                'message' => 'Post could not be saved'
            ]);
        }
    }

    public function updateInterest(Request $request,$id)
    {
        $data = request()->validate([
            'name' => 'required'
        ]);

        $interest       = MajorInterest::where('id', $id)->first();
        $interest->name = $request->name;

        if($this->user->role_id !== 1){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }


            if($interest->save()){
                return response()->json([
                    'status'  => 200,
                    'user'    => $this->user,
                    'interest'    => $interest,
                    'message' => 'interested name updated'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'interested name could not be saved'
                ]);
            }
    }

    public function deleteInterest($id)
    {
        $interest = MajorInterest::find($id);

        if($this->user->role_id !== 1){
            return response()->json([
                'status'  => 403,
                'message' => 'Forbidden',
            ],403);
        }

            if($interest->delete()){
                return response()->json([
                    'status'   => 200,
                    'user'     => $this->user,
                    'interest' => $interest,
                    'message'  => 'This Major Interest name has been deleted'
                ]);
                } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'This interest could not be delete'
                ]);
            }
    }
}
