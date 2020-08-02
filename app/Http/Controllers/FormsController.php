<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormsRequest;
use JWTAuth;
use App\Form;


class FormsController extends Controller
{

    public function __construct()
    {
        $this->user=JWTAuth::parseToken()->authenticate();
    }

    public function searchUserForm($idUser)
    {
        $form = Form::where('user_id', $idUser)->get();
        $form = $form[0];
        $user = $this->user;

        if(isset($form)==true){
            if($this->user->id == $form->user_id){
                return response()->json([
                    'status'=>true,
                    'user'=>$user,
                    'form'=>$form,
                ]);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Unauthorized',
                ],401);
            }
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Form Not Found',
            ],404);
        }
        
    }

    public function storeForm(FormsRequest $request)
    {

        $form= new Form;
        $form->name=$this->user->name;
        $form->user_id=$this->user->id;
        $form->photo=$request->photo;
        $form->gender=$request->gender;
        $form->date_of_birth=$request->date_of_birth;
        $form->religion=$request->religion;
        $form->name_of_father=$request->name_of_father;
        $form->name_of_mother=$request->name_of_mother;
        $form->phone_number_1=$request->phone_number_1;
        $form->phone_number_2=$request->phone_number_2;
        $form->district=$request->district;
        $form->sub_district=$request->sub_district;
        $form->urban_village=$request->urban_village;
        $form->address=$request->address;
        $form->zip_code=$request->zip_code;
        $form->from_jhs=$request->from_jhs;
        $form->nisn=$request->nisn;
        $form->no_kk=$request->no_kk;
        $form->nik_of_student=$request->nik_of_student;
        $form->nik_of_father=$request->nik_of_father;
        $form->nik_of_mother=$request->nik_of_mother;
        $form->father_occupation=$request->father_occupation;
        $form->mother_occupation=$request->mother_occupation;
        $form->majors_interest=$request->majors_interest;

        // if($this->user->id==$form->user_id){
            if($this->user->form()->save($form)){
                return response()->json([
                    'status'=>true,
                    'user'=>$this->user,
                    'form'=>$form,
                ]);
            } else {
                return response()->json([
                    'status'=>false,
                    'message'=>'Form could not be saved'
                ]);
            }
        // }else{
        //     return response()->json([
        //         'status'=>false,
        //         'message'=>'Unauthorized',
        //     ],401);
        // }
    }
}
