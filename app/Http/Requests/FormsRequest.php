<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsRequest extends FormRequest
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
            'gender'             => 'required',
            'date_of_birth'      => 'required',
            'religion'           => 'required',
            'name_of_father'     => 'required',
            'name_of_mother'     => 'required',
            'phone_number_1'     => 'required|digits_between:11,16',
            'phone_number_2'     => 'required|digits_between:11,16',
            'province'           => 'required',
            'district'           => 'required',
            'sub_district'       => 'required',
            'urban_village'      => 'required',
            'address'            => 'required',
            'zip_code'           => 'required|numeric|digits:5',
            'from_jhs'           => 'required',
            'nisn'               => 'required|numeric',
            'no_kk'              => 'required|numeric',
            'nik_of_student'     => 'required|numeric',
            'nik_of_father'      => 'required|numeric',
            'nik_of_mother'      => 'required|numeric',
            'father_occupation'  => 'required',
            'mother_occupation'  => 'required',
            'majors_interest_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'       => 'Field ini tidak boleh kosong',
            'numeric'        => 'Field ini hanya boleh berupa angka',
            'digits'         => 'Field ini hanya boleh 5 karakter',
            'digits_between' => 'Field ini hanya boleh 11 sampai 16 karakter'
        ];
    }
}
