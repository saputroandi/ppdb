<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gender'            => 'required',
            'date_of_birth'     => 'required',
            'born'              => 'required',
            'religion'          => 'required',
            'name_of_father'    => 'required',
            'name_of_mother'    => 'required',
            'phone_number_1'    => 'required|numeric|digits_between:7,8',
            'phone_number_2'    => 'required|numeric|digits_between:7,8',
            'province'          => 'required',
            'district'          => 'required',
            'sub_district'      => 'required',
            'urban_village'     => 'required',
            'address'           => 'required',
            'zip_code'          => 'required|numeric|digits:5',
            'from_jhs'          => 'required',
            'nisn'              => 'required|numeric',
            'no_kk'             => 'required|numeric',
            'nik_of_student'    => 'required|numeric',
            'nik_of_father'     => 'required|numeric',
            'nik_of_mother'     => 'required|numeric',
            'father_occupation' => 'required',
            'mother_occupation' => 'required',
            'majors_interest'   => 'required'
        ];
    }
}
