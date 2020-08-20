<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentConfirmationRequest extends FormRequest
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
            'pay_date'         => 'required',
            'bank_name'        => 'required',
            'bank_account'     => 'required',
            'proof_of_payment' => 'required',
            'status'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
        ];
    }
}
