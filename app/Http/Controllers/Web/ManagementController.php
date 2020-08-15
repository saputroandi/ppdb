<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Form;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ManagementRequest;

class ManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::all();
        
        $id   = auth()->user()->id;
        $user = User::find($id);

            if(isset($user->form->user_id) == false){
                return redirect('/')->with('success','You have to create form first');
            }

        $form_id = $user->form->user_id;
        $role    = auth()->user()->role_id;

            if($role == '2'){
                return redirect('/form/'.$form_id);
            }

        return view('admin.dashboard')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name=auth()->user()->name;

        $id=auth()->user()->id;
        $user=User::find($id);

            //cek user apakah sudah membuat form
            if(isset($user->form->user_id) == false){
                return view('admin.form');
            }
        return redirect('/')->with('success','You Already Have Created Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagementRequest $request)
    {
        $name=auth()->user()->name;
        $id=auth()->user()->id;
        

        //create form
        $form=new Form;
        $form->name=$name;
        $form->user_id=$id;
        $form->photo=$request->input('photo');
        $form->gender=$request->input('gender');
        $form->date_of_birth=$request->input('date_of_birth');
        $form->religion=$request->input('religion');
        $form->name_of_father=$request->input('name_of_father');
        $form->name_of_mother=$request->input('name_of_mother');
        $form->phone_number_1=$request->input('phone_number_1');
        $form->phone_number_2=$request->input('phone_number_2');
        $form->district=$request->input('district');
        $form->sub_district=$request->input('sub_district');
        $form->urban_village=$request->input('urban_village');
        $form->address=$request->input('address');
        $form->zip_code=$request->input('zip_code');
        $form->from_jhs=$request->input('from_jhs');
        $form->nisn=$request->input('nisn');
        $form->no_kk=$request->input('no_kk');
        $form->nik_of_student=$request->input('nik_of_student');
        $form->nik_of_father=$request->input('nik_of_father');
        $form->nik_of_mother=$request->input('nik_of_mother');
        $form->father_occupation=$request->input('father_occupation');
        $form->mother_occupation=$request->input('mother_occupation');
        $form->majors_interest=$request->input('majors_interest');
        $form->save();

        return redirect('/')->with('success','Form Created');


        // dd($form);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userActive=User::find(auth()->user()->id);

            if($userActive->role_id !== 1){
                if(isset($userActive->form->user_id)==true){
                    $form=Form::where('user_id',$id)->get();
                    $form_userId=$form[0]->user_id;
                    if($userActive->id == $form_userId){
                        return view('admin.show')->with('form',$form[0]);
                    }
                }
            }else{
                $form=Form::find($id);
                return view('admin.show')->with('form',$form);
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userActive = User::find(auth()->user()->id);

            if($userActive->role_id !== 1){
                $user        = Form::where('user_id',$id)->get();
                $form_userId = $user[0]->user_id;
                if($userActive->id == $form_userId){
                    return view('admin.edit')->with('user',$user[0]);
                }
            }else{
                $user = Form::where('user_id',$id)->get();
                return view('admin.edit')->with('user',$user[0]);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagementRequest $request, $id)
    {
        $form                    = Form::find($id);
        $form->name              = $request->input('name');
        $form->photo             = $request->input('photo');
        $form->gender            = $request->input('gender');
        $form->date_of_birth     = $request->input('date_of_birth');
        $form->religion          = $request->input('religion');
        $form->name_of_father    = $request->input('name_of_father');
        $form->name_of_mother    = $request->input('name_of_mother');
        $form->phone_number_1    = $request->input('phone_number_1');
        $form->phone_number_2    = $request->input('phone_number_2');
        $form->province          = $request->input('province');
        $form->district          = $request->input('district');
        $form->sub_district      = $request->input('sub_district');
        $form->urban_village     = $request->input('urban_village');
        $form->address           = $request->input('address');
        $form->zip_code          = $request->input('zip_code');
        $form->from_jhs          = $request->input('from_jhs');
        $form->nisn              = $request->input('nisn');
        $form->no_kk             = $request->input('no_kk');
        $form->nik_of_student    = $request->input('nik_of_student');
        $form->nik_of_father     = $request->input('nik_of_father');
        $form->nik_of_mother     = $request->input('nik_of_mother');
        $form->father_occupation = $request->input('father_occupation');
        $form->mother_occupation = $request->input('mother_occupation');
        $form->majors_interest   = $request->input('majors_interest');
        $form->save();

        return redirect('/')->with('success','Form Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = auth()->user()->role_id;

            if($role !== 1){
                return redirect('/')->with('error','User unauthorize');
            }

            User:: find($id)->delete();
            Form:: where('user_id',$id)->delete();
        return redirect('/')->with('success','User Delete');
    }
}
