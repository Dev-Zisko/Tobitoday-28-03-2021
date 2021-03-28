<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeneficiaryRequest extends FormRequest
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
            'name' => 'required|string|max:255|regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/',
            'lastname' => 'required|string|max:255|regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/',
            'identification' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'number_account' => 'required|string|max:20|regex:/^[0-9]+$/',
            'type_account' => 'required|string|max:255',
            'mobile_payment' => 'nullable|string|regex:/^[0-9]+$/',
            'phonenumber' => 'required|string|regex:/^[0-9]+$/',
            'email' => 'required|max:255|regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
      ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'name.regex' =>'El campo nombre solo acepta letras.',
            'lastname.regex' =>'El campo apellido solo acepta letras.',
            'email.regex' => 'Ingrese una dirección de correo con formato válido.',
            'number_account.regex' => 'El campo número de cuenta solo acepta números.',
            'mobile_payment.regex' => 'El campo número de pago móvil solo acepta números.',
            'phonenumber.regex' => 'El campo número de teléfono solo acepta números.',
            'max' => 'Los campos no aceptan más de 255 caracteres.',
            'number_account.max' => 'El campo número de cuenta no puede tener más de 20 caracteres.',
        ];
    }
}
