<?php

namespace App\Http\Requests\Administracao;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProjetoAtividadeRequest extends FormRequest
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
            'tipo' => ['required', Rule::in(['projeto', 'atividade'])],
            'user_cadastro_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O projeto/atividade é obrigatória.',
            'nome.max' => 'O projeto/atividade deve ter no máximo 255 caracteres.',
            'status.required' => 'O status é obrigatório',
            'status.in' => 'O status é inválido',
            'tipo.required' => 'O tipo é obrigatório',
            'tipo.in' => 'O tipo é inválido',
            'user_cadastro_id.required' => 'Você não tem permissão para cadastrar um projeto/atividade.',
            'user_cadastro_id.integer' => 'Você não tem permissão para cadastrar um projeto/atividade.',
            'user_cadastro_id.exists' => 'Você não tem permissão para cadastrar um projeto/atividade.',
        ];
    }
}
