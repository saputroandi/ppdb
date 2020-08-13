<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'semester_1'            => 'required|numeric',
            'semester_2'            => 'required|numeric',
            'semester_3'            => 'required|numeric',
            'semester_4'            => 'required|numeric',
            'semester_5'            => 'required|numeric',
            'semester_6'            => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Field ini tidak boleh kosong',
            'numeric'=>'Field ini hanya boleh berupa angka',
        ];
    }
}
