<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'zipcode' => 'required|string|max:9|min:8',
            'street' => 'required|string|max:255',
            'address_number' => 'required|string|max:10',
            'address_comp' => 'nullable|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
            'max' => 'O campo :attribute não pode ser maior que :max caracteres.',
            'min' => 'O campo :attribute deve ter pelo menos :min caracteres.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nome',
            'phone' => 'telefone',
            'email' => 'e-mail',
            'zipcode' => 'CEP',
            'street' => 'rua',
            'address_number' => 'número',
            'address_comp' => 'complemento',
            'district' => 'bairro',
            'city' => 'cidade',
            'state' => 'estado',
        ];
    }
}
