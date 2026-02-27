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
     * TODO: Completa esta función con las reglas de validación
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Tu código aquí: define las reglas de validación
        ];
    }
}
