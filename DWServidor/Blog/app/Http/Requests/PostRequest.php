<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambiar si deseas restringir permisos
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'contenido' => 'required',
            'autor' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'No puede estar vacio',
            'contenido.required' => 'No puede estar vacio',
            'autor.required' => 'No puede estar vacio',
        ];
    }
}
