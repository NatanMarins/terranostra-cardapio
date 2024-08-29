<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'product_file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
    }

    protected function prepareForValidation()
    {
        // Tratar o valor do campo 'preco' substituindo vírgula por ponto
        $this->merge([
            'preco' => str_replace(',', '.', $this->preco),
        ]);
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Campo nome é obrigatório',
            'descricao.required' => 'Campo descrição é obrigatório',
            'preco.required' => 'Campo preço é obrigatório',
            'preco.numeric' => 'Campo preço deve conter apenas números',
            'categoria_id.required' => 'Campo categoria é obrigatório',
            'product_file_name.required' => 'Upload não foi realizado!',
        ];
    }
}
