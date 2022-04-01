<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessoRequest extends FormRequest
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
            'sei' => 'required|max:255',
            'edital' => 'required|max:30',
            'total_estimado' => 'required',
            'total_homologado' => 'required',
            'data_processo' => 'required|date',
            'status' => 'required',
            'objeto_id' => 'required',
            'modalidade_id' => 'required',
            'tecnico_responsavel_id' => 'required',
            'situacao_acompanhamento_id' => 'required',
            'unidades_contempladas_id' => 'required',
            'tipos_gastos_id' => 'required',
            'valor_tipo_gasto' => 'required',
            'central_id' => 'required|array|min:2',
            'user_cadastro_id' => 'required',

        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
