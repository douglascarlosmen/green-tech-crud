<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
        $productId = $this->route('product');

        return [
            'code' => [
                'required',
                'string',
                Rule::unique('products')->ignore($productId),
            ],
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required',
            'category' => 'required|string|max:255',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'amount' => 'required|integer',
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
            'code.unique' => 'O código do produto já está em uso.',
        ];
    }
}
