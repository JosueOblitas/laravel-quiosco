<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','regex:/^[A-Za-z ]+$/'],
            'email' => ['required','email','unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.regex' => 'El nombre debe ser una cadena',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe tener un formato correcto (tucorre@tudominio.com)',
            'email.unique' => 'El correo ya existe',
            'password' => 'El password como mínimo debe tener 8 letras, números y simbolos',
            'password.confirmed' => 'No coinciden las claves',
        ];
    }
}
