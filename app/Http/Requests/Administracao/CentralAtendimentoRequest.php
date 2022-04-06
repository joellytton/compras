<?php

namespace App\Http\Requests\Administracao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CentralAtendimentoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => 'ativo',
            'user_cadastro_id' => auth()->user()->id,
        ]);

        if ($this->method() == 'PUT') {
            $this->merge([
                'user_alteracao_id' => auth()->user()->id,
            ]);
        }
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'status' => ['required', Rule::in(['ativo', 'inativo'])],
            'user_cadastro_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'A central de atendimento é obrigatório',
            'nome.max' => 'A central de atendimento deve ter no máximo 255 caracteres',
            'status.required' => 'O status é obrigatório',
            'status.in' => 'O status é inválido',
            'user_cadastro_id.required' => 'Você não tem permissão para cadastrar uma central de atendimento',
            'user_cadastro_id.integer' => 'Você não tem permissão para cadastrar uma central de atendimento',
            'user_cadastro_id.exists' => 'Você não tem permissão para cadastrar uma central de atendimento',
        ];
    }
}
