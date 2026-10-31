<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutoresRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombres' => ['required', 'string', 'max:100'],
            'nacionalidad' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:autores,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombres.required' => 'El campo nombres es obligatorio.',
            'nombres.max' => 'El nombre no debe exceder los 100 caracteres.',
            'nacionalidad.required' => 'El campo nacionalidad es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ingresado ya se encuentra registrado.',
        ];
    }
}
