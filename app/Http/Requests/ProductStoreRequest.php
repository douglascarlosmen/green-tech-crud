<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:255', Rule::unique('products', 'code')],
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required',
            'category' => 'required|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
            'amount' => 'required|integer|min:0',
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
            'code.unique' => 'O código do produto já existe no banco de dados.',
        ];
    }
}
