<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLibrosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $libroId = $this->route('libro') ? $this->route('libro')->id : null;
        $anioActual = date('Y');

        return [
            'autor_id' => ['sometimes', 'required', 'exists:autores,id'],
            'titulo' => ['sometimes', 'required', 'string', 'max:150'],
            'isbn' => ['sometimes', 'required', 'string', Rule::unique('libros', 'isbn')->ignore($libroId)],
            'anio_publicacion' => ['sometimes', 'required', 'integer', 'between:1900,' . $anioActual],
            'precio' => ['sometimes', 'required', 'numeric', 'gte:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'autor_id.required' => 'El autor es obligatorio.',
            'autor_id.exists' => 'El autor seleccionado no existe.',
            'titulo.required' => 'El título del libro es obligatorio.',
            'titulo.max' => 'El título no debe exceder los 150 caracteres.',
            'isbn.required' => 'El código ISBN es obligatorio.',
            'isbn.unique' => 'El ISBN ingresado ya está registrado en la base de datos.',
            'anio_publicacion.required' => 'El año de publicación es obligatorio.',
            'anio_publicacion.integer' => 'El año de publicación debe ser un número entero.',
            'anio_publicacion.between' => 'El año de publicación debe estar entre 1900 y el año actual.',
            'precio.required' => 'El precio del libro es obligatorio.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
            'precio.gte' => 'El precio debe ser mayor o igual a 0.',
        ];
    }
}
