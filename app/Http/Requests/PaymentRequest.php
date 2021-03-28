<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'amount' => 'required|string|max:255',
            'rate' => 'required|string|max:255',
            'method' => 'required|string|max:255',
            'status' => 'required|string|max:255',
      ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'amount.regex' => 'El campo monto solo acepta números.',
            'phonenumber.regex' => 'El campo número de teléfono solo acepta números.',
            'max' => 'Los campos no aceptan más de 255 caracteres.',
        ];
    }
}
