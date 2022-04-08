<?php

namespace App\Http\Requests\Administracao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AreaAbrangenciaRequest extends FormRequest
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
            'nome' => ['required'],
            'status' => ['required', Rule::in(['ativo', 'inativo'])],
            'user_cadastro_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'A cidade é obrigatório',
            'status.required' => 'O status é obrigatório',
            'status.in' => 'O status é inválido',
            'user_cadastro_id.required' => 'Você não tem permissão para cadastrar uma área de abrangência',
            'user_cadastro_id.integer' => 'Você não tem permissão para cadastrar uma área de abrangência',
            'user_cadastro_id.exists' => 'Você não tem permissão para cadastrar uma área de abrangência',
        ];
    }
}
