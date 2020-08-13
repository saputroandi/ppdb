<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nama tidak boleh kosong',
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Email tidak valid',
            'email.unique'      => 'Email telah di gunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min'      => 'Password minimal 8 karakter',
        ];
    }
}
