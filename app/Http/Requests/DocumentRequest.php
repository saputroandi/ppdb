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
            'img_semester_1' => 'required',
            'img_semester_2' => 'required',
            'img_semester_3' => 'required',
            'img_semester_4' => 'required',
            'img_semester_5' => 'required',
            'img_semester_6' => 'required',
            'img_skhun'      => 'required',
            'img_akta'       => 'required',
            'img_kk'         => 'required',
        ];
    }
}
