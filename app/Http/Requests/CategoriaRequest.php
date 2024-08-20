<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'categoria' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'categoria.required' => 'Campo categoria é obrigatório',
        ];
    }
}
