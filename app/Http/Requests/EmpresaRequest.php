<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'razao_social' => 'required', 
            'cnpj' => 'required|unique', 
            'responsavel' => 'required', 
            'telefone' => 'required', 
            'email' => 'required|email:empresas|unique',
            'cep' => 'required', 
            'estado' => 'required',
            'cidade' => 'required', 
            'bairro' => 'required', 
            'rua' => 'required', 
            'numero_endereco' => '', 
            'complemento' => '', 
        ];
    }

    public function messages(): array
    {
        return [
            'nome' => 'Campo nome é obrigatório',
            'razao_social' => 'Campo Razão Social é obrigatório', 
            'cnpj' => 'Campo CNPJ é obrigatório', 
            'responsavel' => 'Campo Responsável é obrigatório', 
            'telefone' => 'Campo telefone é obrigatório', 
            'email' => 'Campo E-mail é obrigatório',
            'cep' => 'Campo CEP é obrigatório', 
            'estado' => 'Campo UF é obrigatório',
            'cidade' => 'Campo Cidade é obrigatório', 
            'bairro' => 'Campo Bairro é obrigatório', 
            'rua' => 'Campo Rua é obrigatório', 
        ];
    }
}
