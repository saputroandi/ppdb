<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'img_semester_1' => 'required|max:1999',
            'img_semester_2' => 'required|max:1999',
            'img_semester_3' => 'required|max:1999',
            'img_semester_4' => 'required|max:1999',
            'img_semester_5' => 'required|max:1999',
            'img_semester_6' => 'required|max:1999',
            'img_skhun'      => 'required|max:1999',
            'img_akta'       => 'required|max:1999',
            'img_kk'         => 'required|max:1999',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'File tidak boleh kosong',
            'max'=>'Maksimal ukuran file 2MB'
        ];
    }
}
