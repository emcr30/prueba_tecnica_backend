<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Autoriza la solicitud
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para crear un producto
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|integer|min:0',
        ];
    }
}
