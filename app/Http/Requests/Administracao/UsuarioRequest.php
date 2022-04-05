<?php

namespace App\Http\Requests\Administracao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
            'data_nascimento' => data_br_para_iso($this->data_nascimento),
            'cpf' => str_replace('-', "", str_replace('.', "", $this->cpf))
        ]);
        if ($this->method() == 'PUT') {
            $this->merge([
                'user_alteracao_id' => auth()->user()->id,
            ]);
        }

        if ($this->method() == 'POST') {
            $this->merge([
                'password' => Hash::make(12345678),
            ]);
        }
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'cpf' => 'required|max:14|unique:pessoas_fisicas',
            'rg' => 'required|max:14|unique:pessoas_fisicas',
            'data_nascimento' => 'required',
            'sexo' => 'required',
            'status' => ['required', Rule::in(['ativo', 'inativo'])],
            'user_cadastro_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um email válido.',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres.',
            'email.unique' => 'O email informado já está cadastrado.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.max' => 'O campo CPF deve ter no máximo 14 caracteres.',
            'cpf.unique' => 'O CPF informado já está cadastrado.',
            'rg.required' => 'O campo RG é obrigatório.',
            'rg.max' => 'O campo RG deve ter no máximo 14 caracteres.',
            'rg.unique' => 'O RG informado já está cadastrado.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'sexo.required' => 'O campo sexo é obrigatório.',
        ];
    }
}
