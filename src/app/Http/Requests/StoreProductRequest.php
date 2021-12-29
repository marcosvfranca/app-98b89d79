<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'sku' => ['required', 'string', 'max:100'],
            'initial_quantity' => ['required', 'integer']
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
            'name.required' => 'Campo nome é obrigatório',
            'name.string' => 'Campo nome deve ser string',
            'name.max' => 'Campo nome deve possuir no máximo 100 caracteres',
            'sku.required' => 'Campo SKU é obrigatório',
            'sku.string' => 'Campo SKU deve ser string',
            'sku.max' => 'Campo SKU deve possui no máximo 100 caracteres',
            'initial_quantity.required' => 'Campo quantidade inicial é obrigatório',
            'initial_quantity.integer' => 'Campo quantidade inicial deve ser um número'
        ];
    }

}
