<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentDetailsRequest extends FormRequest
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
            'cost_type'=>'required',
            'session_1'=>'required|numeric',
            'session_2'=>'required|numeric',
            'session_3'=>'required|numeric',
            'note'=>'required',
        ];
    }
}
