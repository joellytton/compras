<?php

namespace App\Http\Requests;

use App\Rules\verificarValorTipoGasto;
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
            'total_estimado' => numero_br_para_iso($this->total_estimado),
            'total_homologado' => numero_br_para_iso($this->total_homologado),

        ]);
        $arrayValor = array();
        if (!empty($this->valor_tipo_gasto)) {
            foreach ($this->valor_tipo_gasto as $key => $valor) {
                $arrayValor[$key] = numero_br_para_iso($valor);
            }

            $this->merge(['valor_tipo_gasto' => $arrayValor]);
        }

        if ($this->method() == 'PUT') {
            $this->merge([
                'user_alteracao_id' => auth()->user()->id,
            ]);
        }
    }

    public function rules()
    {
        return [
            'sei' => 'required|max:100',
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
            'area_abrangencia_id' => 'required',
            'tipos_gastos_id.*' => 'required',
            'valor_tipo_gasto' => ['required', new verificarValorTipoGasto],
            'central_id.*' => 'required',
            'user_cadastro_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sei.required' => 'O campo SEI é obrigatório!',
            'sei.max' => 'O campo SEI deve ter no máximo 100 caracteres!',
            'edital.required' => 'O campo Edital é obrigatório!',
            'edital.max' => 'O campo Edital deve ter no máximo 30 caracteres!',
            'total_estimado.required' => 'O campo Total Estimado é obrigatório!',
            'total_homologado.required' => 'O campo Total Homologado é obrigatório!',
            'data_processo.required' => 'O campo Data do Processo é obrigatório!',
            'data_processo.date' => 'O campo Data do Processo deve ser uma data válida!',
            'status.required' => 'O campo Status é obrigatório!',
            'objeto_id.required' => 'O campo Objeto é obrigatório!',
            'modalidade_id.required' => 'O campo Modalidade é obrigatório!',
            'tecnico_responsavel_id.required' => 'O campo Técnico Responsável é obrigatório!',
            'situacao_acompanhamento_id.required' => 'O campo Situação é obrigatório!',
            'unidades_contempladas_id.required' => 'O campo Unidades Contempladas é obrigatório!',
            'area_abrangencia_id.required' => 'O campo Área de Abrangência é obrigatório!',
            'tipos_gastos_id.*.required' => 'O campo Tipo de Gasto é obrigatório!',
            'valor_tipo_gasto.required' => 'O campo Valor do Tipo de Gasto é obrigatório!',
            'central_id.*.required' => 'O campo Central é obrigatório!',
            'central_id.*.array' => 'O campo Central deve ser um array!',
            'central_id.*.max' => 'O campo Central deve ter no máximo 5 elementos!',
            'user_cadastro_id.required' => 'O campo Usuário é obrigatório!',
        ];
    }
}
