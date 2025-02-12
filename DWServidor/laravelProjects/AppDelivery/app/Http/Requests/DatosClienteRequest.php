<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar si deseas restringir permisos
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required|regex:/^[6789]\d{8}$/',
            'credit_card' => 'required|digits_between:13,19',
            'delivery_company' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'No puede estar vacio',
            'phone.required' => 'No puede estar vacio',
            'phone.regex' => 'El teléfono debe tener 9 dígitos y empezar con 6, 7, 8 o 9.',
            'credit_card.required' => 'Campo obligatorio',
            'credit_card.digits_between' => 'La tarjeta de crédito debe tener entre 13 y 19 dígitos.',
            'delivery_company.required' => 'Campo obligatorio',
        ];
    }
}
