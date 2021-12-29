<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductMovementRequest extends FormRequest
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
            'sku' => ['required', 'exists:App\Models\Product,sku'],
            'quantity' => ['required', 'integer']
        ];
    }

    /**
     * Validation errors messages
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'sku.required' => 'Campo SKU é obrigatório',
            'sku.exists' => 'SKU informado não encontrado',
            'quantity.required' => 'Campo quantidade é obrigatório',
            'quantity.integer' => 'Campo quantidade deve ser um número'
        ];
    }

}
