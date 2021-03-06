@push('css')
<link rel="stylesheet" href="{{asset('assets/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/summernote/summernote-bs4.css')}}">
@endpush
<!-- form start -->
<div class="card-body">
    <div class="form-group row">
        <div class="col-sm-12 col-md-4">
            <label for="sei" class="col-form-label">Sei:</label>
            <input type="text" name="sei" class="form-control {{$errors->has('sei') ? 'is-invalid' : ''}}"
                aria-describedby="seiFeedback" value="{{empty(old('sei')) ? @$processo->sei : old('sei')}}">
            @if ($errors->has('sei'))
            <div id="seiFeedback" class="invalid-feedback">
                {{$errors->first('sei')}}
            </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="edital" class="col-form-label">Nº do Edital:</label>
            <input type="text" name="edital" class="form-control {{$errors->has('edital') ? 'is-invalid' : ''}}"
                aria-describedby="editalFeedback" value="{{empty(old('edital')) ? @$processo->edital : old('edital')}}">
            @if ($errors->has('edital'))
            <div id="editalFeedback" class="invalid-feedback">
                {{$errors->first('edital')}}
            </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="data_processo" class="col-form-label">Data de Recebimento(DIVCCL):</label>
            <input type="text" name="data_processo"
                class="form-control {{$errors->has('data_processo') ? 'is-invalid' : ''}}"
                aria-describedby="dataProcessoFeedback"
                value="{{empty(old('data_processo')) ?  @$processo->data_processo : old('data_processo')}}"
                data-inputmask="'mask': '99/99/9999'">
            @if ($errors->has('data_processo'))
            <div id="dataProcessoFeedback" class="invalid-feedback">
                {{$errors->first('data_processo')}}
            </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-4">
            <label for="objeto_id" class="col-form-label">Objeto:</label>
            <select name="objeto_id" class="form-control select2 {{$errors->has('objeto_id') ? 'is-invalid' : ''}}">
                <option value="">Selecione uma opção</option>
                @foreach($objetos as $objeto)
                <option value="{{$objeto->id}}"
                    {{(empty(old('objeto_id')) ? @$processo->objeto_id : old('objeto_id')) == $objeto->id ? 'selected' : ''}}>
                    {{$objeto->nome}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('objeto_id'))
            <div id="objetoIdFeedback" class="invalid-feedback">
                {{$errors->first('objeto_id')}}
            </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="modalidade_id" class="col-form-label">Modalidade:</label>
            <select name="modalidade_id"
                class="form-control select2 {{$errors->has('modalidade_id') ? 'is-invalid' : ''}}"
                aria-describedby="modalidadeIdFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($modalidades as $modalidade)
                <option value="{{$modalidade->id}}"
                    {{(empty(old('modalidade_id')) ? @$processo->modalidade_id : old('modalidade_id')) == $modalidade->id ? 'selected' : ''}}>
                    {{$modalidade->nome}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('modalidade_id'))
            <div id="modalidadeIdFeedback" class="invalid-feedback">
                {{$errors->first('modalidade_id')}}
            </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="tecnico_responsavel_id" class="col-form-label">Técnico Responsável:</label>
            <select name="tecnico_responsavel_id"
                class="form-control select2 {{$errors->has('tecnico_responsavel_id') ? 'is-invalid' : ''}}"
                aria-describedby="tecnicoResponsavelIdFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($usuarios as $usuario)
                <option value="{{$usuario->id}}"
                    {{(empty(old('tecnico_responsavel_id')) ? @$processo->tecnico_responsavel_id : old('tecnico_responsavel_id')) == $usuario->id ? 'selected' : ''}}>
                    {{$usuario->name}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('tecnico_responsavel_id'))
            <div id="tecnicoResponsavelIdFeedback" class="invalid-feedback">
                {{$errors->first('tecnico_responsavel_id')}}
            </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-3">
            <label for="situacao_acompanhamento_id" class="col-form-label">Situação de Acompanhamento:</label>
            <select name="situacao_acompanhamento_id"
                class="form-control select2 {{$errors->has('situacao_acompanhamento_id') ? 'is-invalid' : ''}}"
                aria-describedby="situacaoAcompanhamentoIdFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($situacoes as $situacao)
                <option value="{{$situacao->id}}"
                    {{(empty(old('situacao_acompanhamento_id')) ? @$processo->situacao_acompanhamento_id : old('situacao_acompanhamento_id')) == $situacao->id ? 'selected' : ''}}>
                    {{$situacao->nome}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('situacao_acompanhamento_id'))
            <div id="situacaoAcompanhamentoIdFeedback" class="invalid-feedback">
                {{$errors->first('situacao_acompanhamento_id')}}
            </div>
            @endif
        </div>
        <div class="col-sm-12 col-md-3">
            <label for="area_abrangencia_id" class="col-form-label">Área de Abrangência:</label>
            <select name="area_abrangencia_id"
                class="form-control select2 {{$errors->has('area_abrangencia_id') ? 'is-invalid' : ''}}"
                aria-describedby="area_abrangencia_idFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($areasDeAbrangencias as $area)
                <option value="{{$area->id}}"
                    {{(empty(old('area_abrangencia_id')) ? @$processo->areaAbrangencia[0]->id : old('area_abrangencia_id')) == $area->id ? 'selected' : ''}}>
                    {{$area->nome}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('area_abrangencia_id'))
            <div id="area_abrangencia_idFeedback" class="invalid-feedback">
                {{$errors->first('area_abrangencia_id')}}
            </div>
            @endif
        </div>
        <div class="col-sm-12 col-md-3">
            <label for="total_estimado" class="col-form-label">Valor Total Estimado:</label>
            <input type="text" name="total_estimado"
                class="form-control money {{$errors->has('total_estimado') ? 'is-invalid' : ''}}"
                aria-describedby="totalEstimadoFeedback"
                value="{{empty(old('total_estimado')) ? numero_iso_para_br(@$processo->total_estimado) : old('total_estimado')}}">
            @if ($errors->has('total_estimado'))
            <div id="totalEstimadoFeedback" class="invalid-feedback">
                {{$errors->first('total_estimado')}}
            </div>
            @endif
        </div>
        <div class="col-sm-12 col-md-3">
            <label for="total_homologado" class="col-form-label">Valor Total Homologado:</label>
            <input type="text" name="total_homologado"
                class="form-control money {{$errors->has('total_homologado') ? 'is-invalid' : ''}}"
                aria-describedby="totalHomologadoFeedback"
                value="{{empty(old('total_homologado')) ? numero_iso_para_br(@$processo->total_homologado) : old('total_homologado')}}">
            @if ($errors->has('total_homologado'))
            <div id="totalHomologadoFeedback" class="invalid-feedback">
                {{$errors->first('total_homologado')}}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Unidades Contempladas</h3>
    </div>
    <div class="card-body ">
        <div class="divUnidades">
            @if (!empty(old('unidades_contempladas_id')))
            @foreach (old('unidades_contempladas_id') as $processoUnidade)
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="unidades_contempladas_id" class="col-form-label">Unidades Contempladas:</label>
                    <select name="unidades_contempladas_id[]"
                        class="form-control select2 {{$errors->has('unidades_contempladas_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="unidadeIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($unidadesContempladas as $unidade)
                        <option value="{{$unidade->id}}" @if(@$processoUnidade==$unidade->id) selected
                            @endif>
                            {{$unidade->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('unidades_contempladas_id.*'))
                    <div id="unidadeIdFeedback" class="invalid-feedback">
                        {{$errors->first('unidades_contempladas_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-1">
                    <label for="" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaUnidade($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach

            @else
            @if (!empty($processo->unidades))
            @foreach ($processo->unidades as $processoUnidade)
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="unidades_contempladas_id" class="col-form-label">Unidades Contempladas:</label>
                    <select name="unidades_contempladas_id[]"
                        class="form-control select2 {{$errors->has('unidades_contempladas_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="unidadeIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($unidadesContempladas as $unidade)
                        <option value="{{$unidade->id}}" {{$processoUnidade->id == $unidade->id ? 'selected' : ''}}>
                            {{$unidade->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('unidades_contempladas_id.*'))
                    <div id="unidadeIdFeedback" class="invalid-feedback">
                        {{$errors->first('unidades_contempladas_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-1">
                    <label for="" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaUnidade($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach

            @else
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="unidades_contempladas_id" class="col-form-label">Unidades Contempladas:</label>
                    <select name="unidades_contempladas_id[]"
                        class="form-control select2 {{$errors->has('unidades_contempladas_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="unidadeIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($unidadesContempladas as $unidade)
                        <option value="{{$unidade->id}}">
                            {{$unidade->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('unidades_contempladas_id.*'))
                    <div id="unidadeIdFeedback" class="invalid-feedback">
                        {{$errors->first('unidades_contempladas_id.*')}}
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @endif
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <button type="button" class="btn btn-primary btn-flat" onclick="addUnidade()">+</button>
            </div>
        </div>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Tipos de Gastos</h3>
    </div>
    <div class="card-body">
        <div class="divTipoGasto">
            @if (!empty(old('tipos_gastos_id')))
            @foreach (old('tipos_gastos_id') as $key => $processoTipo)
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="tipos_gastos_id" class="col-form-label">Tipo de Gasto:</label>
                    <select name="tipos_gastos_id[]"
                        class="form-control select2 {{$errors->has('tipos_gastos_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="tiposGastosIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($tiposGastos as $tipoGasto)
                        <option value="{{$tipoGasto->id}}" {{$processoTipo == $tipoGasto->id ? 'selected' : ''}}>
                            {{$tipoGasto->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('tipos_gastos_id.*'))
                    <div id="tiposGastosIdFeedback" class="invalid-feedback">
                        {{$errors->first('tipos_gastos_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_tipo_gasto" class="col-form-label">Valor do Tipo de Gasto:</label>
                    <input type="text" name="valor_tipo_gasto[]"
                        class="form-control money {{$errors->has('valor_tipo_gasto') ? 'is-invalid' : ''}}"
                        aria-describedby="valorTipoGastoFeedback" value="{{old('valor_tipo_gasto')[$key]}}">
                    @if ($errors->has('valor_tipo_gasto'))
                    <div id="valorTipoGastoFeedback" class="invalid-feedback">
                        {{$errors->first('valor_tipo_gasto')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-1">
                    <label for="valor_tipo_gasto" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaTipoGasto($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
            @else
            @if (!empty(@$processo->tiposGastos))
            @foreach ($processo->tiposGastos as $processoTipo)
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="tipos_gastos_id" class="col-form-label">Tipo de Gasto:</label>
                    <select name="tipos_gastos_id[]"
                        class="form-control select2 {{$errors->has('tipos_gastos_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="tiposGastosIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($tiposGastos as $tipoGasto)
                        <option value="{{$tipoGasto->id}}" {{$processoTipo->id == $tipoGasto->id ? 'selected' : ''}}>
                            {{$tipoGasto->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('tipos_gastos_id.*'))
                    <div id="tiposGastosIdFeedback" class="invalid-feedback">
                        {{$errors->first('tipos_gastos_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_tipo_gasto" class="col-form-label">Valor do Tipo de Gasto:</label>
                    <input type="text" name="valor_tipo_gasto[]"
                        class="form-control money {{$errors->has('valor_tipo_gasto') ? 'is-invalid' : ''}}"
                        aria-describedby="valorTipoGastoFeedback"
                        value="{{numero_iso_para_br($processoTipo->pivot->valor_tipo_gasto)}}">
                    @if ($errors->has('valor_tipo_gasto'))
                    <div id="valorTipoGastoFeedback" class="invalid-feedback">
                        {{$errors->first('valor_tipo_gasto')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-1">
                    <label for="valor_tipo_gasto" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaTipoGasto($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
            @else
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="tipos_gastos_id" class="col-form-label">Tipo de Gasto:</label>
                    <select name="tipos_gastos_id[]"
                        class="form-control select2 {{$errors->has('tipos_gastos_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="tiposGastosIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($tiposGastos as $tipoGasto)
                        <option value="{{$tipoGasto->id}}">
                            {{$tipoGasto->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('tipos_gastos_id.*'))
                    <div id="tiposGastosIdFeedback" class="invalid-feedback">
                        {{$errors->first('tipos_gastos_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_tipo_gasto" class="col-form-label">Valor do Tipo de Gasto:</label>
                    <input type="text" name="valor_tipo_gasto[]"
                        class="form-control money {{$errors->has('valor_tipo_gasto') ? 'is-invalid' : ''}}"
                        aria-describedby="valorTipoGastoFeedback" value="">
                    @if ($errors->has('valor_tipo_gasto'))
                    <div id="valorTipoGastoFeedback" class="invalid-feedback">
                        {{$errors->first('valor_tipo_gasto')}}
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @endif
        </div>

        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <button type="button" class="btn btn-primary btn-flat" onclick="addTipoGasto()">+</button>
            </div>
        </div>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Ação/Convênio</h3>
    </div>
    <div class="card-body">
        <div class="divAcaoConvenio">
            @if (!empty(old('acao_convenio_id')))
            @foreach (old('acao_convenio_id') as $key => $processoAcaoConvenio)
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="acao_convenio_id" class="col-form-label">Ação/Convênio:</label>
                    <select name="acao_convenio_id[]"
                        class="form-control select2 {{$errors->has('acao_convenio_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="acaoConvenioIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($acaoConvenios as $acaoConvenio)
                        <option value="{{$acaoConvenio->id}}"
                            {{$processoAcaoConvenio == $acaoConvenio->id ? 'selected' : ''}}>
                            {{$acaoConvenio->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('acao_convenio_id.*'))
                    <div id="acaoConvenioIdFeedback" class="invalid-feedback">
                        {{$errors->first('acao_convenio_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_tipo_gasto" class="col-form-label">Valor da Ação/Convênio:</label>
                    <input type="text" name="valor_tipo_gasto[]"
                        class="form-control money {{$errors->has('valor_tipo_gasto') ? 'is-invalid' : ''}}"
                        aria-describedby="valorTipoGastoFeedback" value="{{old('valor_tipo_gasto')[$key]}}">
                    @if ($errors->has('valor_tipo_gasto'))
                    <div id="valorTipoGastoFeedback" class="invalid-feedback">
                        {{$errors->first('valor_tipo_gasto')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-1">
                    <label class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaAcaoConvenio($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
            @else
            @if (!empty(@$processo->acaoConvenio))
            @foreach ($processo->acaoConvenio as $processoAcaoConvenio)
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="acao_convenio_id" class="col-form-label">Ação/Convênio:</label>
                    <select name="acao_convenio_id[]"
                        class="form-control select2 {{$errors->has('acao_convenio_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="acaoConvenioIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($acaoConvenios as $acaoConvenio)
                        <option value="{{$acaoConvenio->id}}"
                            {{$processoAcaoConvenio->id == $acaoConvenio->id ? 'selected' : ''}}>
                            {{$acaoConvenio->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('acao_convenio_id.*'))
                    <div id="acaoConvenioIdFeedback" class="invalid-feedback">
                        {{$errors->first('acao_convenio_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_acao_convenio" class="col-form-label">Valor da Ação/Convênio:</label>
                    <input type="text" name="valor_acao_convenio[]"
                        class="form-control money {{$errors->has('valor_acao_convenio') ? 'is-invalid' : ''}}"
                        aria-describedby="valorAcaoConvenioFeedback"
                        value="{{numero_iso_para_br($processoTipo->pivot->valor_tipo_gasto)}}">
                    @if ($errors->has('valor_acao_convenio'))
                    <div id="valorAcaoConvenioFeedback" class="invalid-feedback">
                        {{$errors->first('valor_acao_convenio')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-1">
                    <label class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaAcaoConvenio($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
            @else
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="projeto_atividade_id" class="col-form-label">Projeto/Atividade:</label>
                    <select name="projeto_atividade_id[]"
                        class="form-control select2 {{$errors->has('projeto_atividade_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="valorAcaoConvenioFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($projetoAtividades as $projetoAtividade)
                        <option value="{{$projetoAtividade->id}}">
                            {{$projetoAtividade->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('projeto_atividade_id.*'))
                    <div id="projetoAtividadeIdFeedback" class="invalid-feedback">
                        {{$errors->first('projeto_atividade_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_acao_convenio" class="col-form-label">Valor da Ação/Convênio:</label>
                    <input type="text" name="valor_acao_convenio[]"
                        class="form-control money {{$errors->has('valor_acao_convenio') ? 'is-invalid' : ''}}"
                        aria-describedby="valorAcaoConvenioFeedback" value="">
                    @if ($errors->has('valor_acao_convenio'))
                    <div id="valorAcaoConvenioFeedback" class="invalid-feedback">
                        {{$errors->first('valor_acao_convenio')}}
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @endif
        </div>

        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <button type="button" class="btn btn-primary btn-flat" onclick="addAcaoConvenio()">+</button>
            </div>
        </div>
    </div>
</div>


<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Projeto/Atividade</h3>
    </div>
    <div class="card-body">
        <div class="divProjetoAtividade">
            @if (!empty(old('projeto_atividade_id')))
            @foreach (old('projeto_atividade_id') as $key => $tipoProjetoAtividade)
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="projeto_atividade_id" class="col-form-label">Tipo de Gasto:</label>
                    <select name="projeto_atividade_id[]"
                        class="form-control select2 {{$errors->has('projeto_atividade_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="projetoAtividadeIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($projetoAtividades as $projetoAtividade)
                        <option value="{{$projetoAtividade->id}}"
                            {{$tipoProjetoAtividade == $projetoAtividade->id ? 'selected' : ''}}>
                            {{$projetoAtividade->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('projeto_atividade_id.*'))
                    <div id="projetoAtividadeIdFeedback" class="invalid-feedback">
                        {{$errors->first('projeto_atividade_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_projeto_atividade" class="col-form-label">Valor do Projeto/Atividade:</label>
                    <input type="text" name="valor_projeto_atividade[]"
                        class="form-control money {{$errors->has('valor_projeto_atividade') ? 'is-invalid' : ''}}"
                        aria-describedby="valorProjetoAtividadeFeedback"
                        value="{{old('valor_projeto_atividade')[$key]}}">
                    @if ($errors->has('valor_projeto_atividade'))
                    <div id="valorProjetoAtividadeFeedback" class="invalid-feedback">
                        {{$errors->first('valor_projeto_atividade')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-1">
                    <label class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaProjetoAtividade($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
            @else
            @if (!empty(@$processo->projetoAtividade))
            @foreach ($processo->projetoAtividade as $projetoAtividadeTipo)
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="projeto_atividade_id" class="col-form-label">Projeto/Atividade:</label>
                    <select name="projeto_atividade_id[]"
                        class="form-control select2 {{$errors->has('projeto_atividade_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="projetoAtividadeIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($projetoAtividades as $projetoAtividade)
                        <option value="{{$projetoAtividade->id}}"
                            {{$projetoAtividade->id == $projetoAtividadeTipo->id ? 'selected' : ''}}>
                            {{$projetoAtividade->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('projeto_atividade_id.*'))
                    <div id="projetoAtividadeIdFeedback" class="invalid-feedback">
                        {{$errors->first('projeto_atividade_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_projeto_atividade" class="col-form-label">Valor do Projeto/Atividade:</label>
                    <input type="text" name="valor_projeto_atividade[]"
                        class="form-control money {{$errors->has('valor_projeto_atividade') ? 'is-invalid' : ''}}"
                        aria-describedby="valorProjetoAtividadeFeedback"
                        value="{{numero_iso_para_br($processoTipo->pivot->valor_tipo_gasto)}}">
                    @if ($errors->has('valor_projeto_atividade'))
                    <div id="valorProjetoAtividadeFeedback" class="invalid-feedback">
                        {{$errors->first('valor_projeto_atividade')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-1">
                    <label for="valor_tipo_gasto" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaProjetoAtividade($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
            @else
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="projeto_atividade_id" class="col-form-label">Projeto/Atividade:</label>
                    <select name="projeto_atividade_id[]"
                        class="form-control select2 {{$errors->has('projeto_atividade_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="projetoAtividadeIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($projetoAtividades as $projetoAtividade)
                        <option value="{{$projetoAtividade->id}}">
                            {{$projetoAtividade->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('projeto_atividade_id.*'))
                    <div id="projetoAtividadeIdFeedback" class="invalid-feedback">
                        {{$errors->first('projeto_atividade_id.*')}}
                    </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_projeto_atividade" class="col-form-label">Valor do Tipo de Gasto:</label>
                    <input type="text" name="valor_projeto_atividade[]"
                        class="form-control money {{$errors->has('valor_projeto_atividade') ? 'is-invalid' : ''}}"
                        aria-describedby="valorProjetoAtividadeFeedback" value="">
                    @if ($errors->has('valor_projeto_atividade'))
                    <div id="valorProjetoAtividadeFeedback" class="invalid-feedback">
                        {{$errors->first('valor_projeto_atividade')}}
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @endif
        </div>

        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <button type="button" class="btn btn-primary btn-flat" onclick="addProjetoAtividade()">+</button>
            </div>
        </div>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Centrais de Atendimento</h3>
    </div>
    <div class="card-body ">
        <div class="divCentral">
            @if (!empty(old('central_id')))
            @foreach (old('central_id') as $processoCentral)
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="central_id" class="col-form-label">Central de Atendimento:</label>
                    <select name="central_id[]"
                        class="form-control select2 {{$errors->has('central_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="centralIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($centrais as $central)
                        <option value="{{$central->id}}" @if(@$processoCentral==$central->id) selected
                            @endif>
                            {{$central->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('central_id.*'))
                    <div id="centralIdFeedback" class="invalid-feedback">
                        {{$errors->first('central_id.*')}}
                    </div>
                    @endif
                </div>


                <div class="col-sm-12 col-md-1">
                    <label for="valor_tipo_gasto" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaCentral($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach

            @else
            @if (!empty($processo->centrais))
            @foreach ($processo->centrais as $processoCentral)
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="central_id" class="col-form-label">Central de Atendimento:</label>
                    <select name="central_id[]"
                        class="form-control select2 {{$errors->has('central_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="centralIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($centrais as $central)
                        <option value="{{$central->id}}" {{$processoCentral->id == $central->id ? 'selected' : ''}}>
                            {{$central->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('central_id.*'))
                    <div id="centralIdFeedback" class="invalid-feedback">
                        {{$errors->first('central_id.*')}}
                    </div>
                    @endif
                </div>


                <div class="col-sm-12 col-md-1">
                    <label for="valor_tipo_gasto" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                        onclick="removeLinhaCentral($(this))">
                        <i class="fas fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach

            @else
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="central_id" class="col-form-label">Central de Atendimento:</label>
                    <select name="central_id[]"
                        class="form-control select2 {{$errors->has('central_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="centralIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($centrais as $central)
                        <option value="{{$central->id}}">
                            {{$central->nome}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('central_id.*'))
                    <div id="centralIdFeedback" class="invalid-feedback">
                        {{$errors->first('central_id.*')}}
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @endif

        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <button type="button" class="btn btn-primary btn-flat" onclick="addCentral()">+</button>
            </div>
        </div>
    </div>
</div>

{{-- <div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Anotações</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <textarea name="descricao" class="form-control" cols="30"
                    rows="10">{{empty(old('descricao')) ? @$processo->descricao : old('descricao')}}</textarea>

@if ($errors->has('descricao'))
<div id="descricaoFeedback" class="invalid-feedback">
    {{$errors->first('descricao')}}
</div>
@endif
</div>
</div>
</div>
</div> --}}

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
@push('js')
<script src="{{asset('assets/select2/js/select2.full.js')}}"></script>
<script src="{{asset('assets/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets/summernote/lang/summernote-pt-BR.min.js')}}"></script>
<script src="{{asset('assets/plentz-jquery-maskmoney/dist/jquery.maskMoney.min.js')}}"></script>
<script>
    $('.select2').select2({
        theme: 'bootstrap4'
    });
    var quantidadeTipoGasto = 1;

    function addTipoGasto() {
        quantidadeTipoGasto++;

        if (quantidadeTipoGasto > 5) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: "Limite de 5 tipos de gastos",
                showConfirmButton: true,
                timer: 2000
            })
            return;
        }
        var html = `
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="tipos_gastos_id" class="col-form-label">Tipo de Gasto:</label>
                        <select name="tipos_gastos_id[]"
                            class="form-control select2 {{$errors->has('tipos_gastos_id') ? 'is-invalid' : ''}}"
                            aria-describedby="tiposGastosIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($tiposGastos as $tipoGasto)
                            <option value="{{$tipoGasto->id}}"
                                @if(@$processo->tipos_gastos_id == $tipoGasto->id) selected @endif>
                                {{$tipoGasto->nome}}
                            </option>
                        @endforeach
                        </select>
            </div>

        <div class="col-sm-12 col-md-4">
            <label for="valor_tipo_gasto" class="col-form-label">Valor do Tipo de Gasto:</label>
            <input type="text" name="valor_tipo_gasto[]"
            class="form-control money" aria-describedby="valorTipoGastoFeedback" value="">
        </div>
        <div class="col-sm-12 col-md-1">
            <label for="valor_tipo_gasto" class="col-form-label">&emsp;</label>
            <button type="button" class="btn btn-danger btn-flat form-control"
            onclick="removeLinhaTipoGasto($(this))">
             <i class="fas fa-solid fa-trash"></i>
            </button>
        </div>
    </div>`;
        $('.divTipoGasto').append(html);
        $(".money").maskMoney({
            allowNegative: true,
            thousands: '.',
            decimal: ',',
            affixesStay: false
        });
    }

    function removeLinhaTipoGasto(element) {
        element.parent().parent().remove();
        quantidadeTipoGasto--;
    }


    var quantidadeAcaoConvenio = 1;

    function addAcaoConvenio() {
        quantidadeAcaoConvenio++;

        if (quantidadeAcaoConvenio > 5) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: "Limite de 5 ação/convênio",
                showConfirmButton: true,
                timer: 2000
            })
            return;
        }
        var html = `
        <div class="form-group row">
            <div class="col-sm-12 col-md-4">
                <label for="acao_convenio_id" class="col-form-label">Ação/Convênio:</label>
                    <select name="acao_convenio_id[]"
                        class="form-control select2 {{$errors->has('acao_convenio_id') ? 'is-invalid' : ''}}"
                        aria-describedby="acaoConvenioIdFeedback">
                    <option value="">Selecione uma opção</option>
                    @foreach($acaoConvenios as $acaoConvenio)
                        <option value="{{$acaoConvenio->id}}"
                            @if(@$processo->acao_convenio_id == $acaoConvenio->id) selected @endif>
                            {{$acaoConvenio->nome}}
                        </option>
                    @endforeach
                    </select>
        </div>

    <div class="col-sm-12 col-md-4">
        <label for="valor_acao_convenio" class="col-form-label">Valor da Ação/Convênio:</label>
        <input type="text" name="valor_acao_convenio[]"
        class="form-control money" aria-describedby="acaoConvenioIdFeedback" value="">
    </div>
    <div class="col-sm-12 col-md-1">
        <label class="col-form-label">&emsp;</label>
        <button type="button" class="btn btn-danger btn-flat form-control"
        onclick="removeLinhaAcaoConvenio($(this))">
         <i class="fas fa-solid fa-trash"></i>
        </button>
    </div>
</div>`;
        $('.divAcaoConvenio').append(html);
        $(".money").maskMoney({
            allowNegative: true,
            thousands: '.',
            decimal: ',',
            affixesStay: false
        });
    }

    function removeLinhaAcaoConvenio(element) {
        element.parent().parent().remove();
        quantidadeAcaoConvenio--;
    }

    var quantidadeProjetoAtividade = 1;

    function addProjetoAtividade() {
        quantidadeProjetoAtividade++;

        if (quantidadeProjetoAtividade > 5) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: "Limite de 5 projeto/atividade",
                showConfirmButton: true,
                timer: 2000
            })
            return;
        }
        var html = `
    <div class="form-group row">
        <div class="col-sm-12 col-md-4">
            <label for="projeto_atividade_id" class="col-form-label">Projeto/Atividade:</label>
                <select name="projeto_atividade_id[]"
                    class="form-control select2 {{$errors->has('projeto_atividade_id') ? 'is-invalid' : ''}}"
                    aria-describedby="projetoAtividadeIdFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($projetoAtividades as $projetoAtividade)
                    <option value="{{$projetoAtividade->id}}"
                        @if(@$processo->projeto_atividade_id == $projetoAtividade->id) selected @endif>
                        {{$projetoAtividade->nome}}
                    </option>
                @endforeach
                </select>
    </div>

<div class="col-sm-12 col-md-4">
    <label for="valor_projeto_atividade" class="col-form-label">Valor do Projeto/Atividade:</label>
    <input type="text" name="valor_projeto_atividade[]"
    class="form-control money" aria-describedby="projetoAtividadeIdFeedback" value="">
</div>
<div class="col-sm-12 col-md-1">
    <label class="col-form-label">&emsp;</label>
    <button type="button" class="btn btn-danger btn-flat form-control"
    onclick="removeLinhaProjetoAtividade($(this))">
     <i class="fas fa-solid fa-trash"></i>
    </button>
</div>
</div>`;
        $('.divProjetoAtividade').append(html);
        $(".money").maskMoney({
            allowNegative: true,
            thousands: '.',
            decimal: ',',
            affixesStay: false
        });
    }

    function removeLinhaProjetoAtividade(element) {
        element.parent().parent().remove();
        quantidadeProjetoAtividade--;
    }

    var quantidadeCentral = 1;

    function addCentral() {
        if (quantidadeCentral > 5) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: "Limite de 5 centrais de atendimento",
                showConfirmButton: true,
                timer: 2000
            })
            return;
        }

        quantidadeCentral++;

        let central = `<div class="form-group row">
            <div class="col-sm-12 col-md-8">
                <label for="central_id" class="col-form-label">Central de Atendimento:</label>
                <select name="central_id[]"
                        class="form-control select2 {{$errors->has('central_id') ? 'is-invalid' : ''}}"
                        aria-describedby="centralIdFeedback">
                    <option value="">Selecione uma opção</option>'`;

        @foreach($centrais as $central)
        central += ` <option value="{{$central->id}}">
                            {{$central->nome}}
            </option>`;
        @endforeach
        central += `</select>
            </div>
           <div class="col-sm-12 col-md-1">
                    <label for="valor_tipo_gasto" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                    onclick="removeLinhaCentral($(this))">
                     <i class="fas fa-solid fa-trash"></i>
                    </button>
           </div>
        </div>`;
        $(".divCentral").append(central);
    }

    function removeLinhaCentral(element) {
        element.parent().parent().remove();
        quantidadeCentral--;
    }

    var quantidadeUnidade = 1;

    function addUnidade() {
        if (quantidadeUnidade > 5) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: "Limite de 5 unidades contempladas",
                showConfirmButton: true,
                timer: 2000
            })
            return;
        }

        quantidadeUnidade++;

        let unidade = `<div class="form-group row">
            <div class="col-sm-12 col-md-8">
                <label for="unidades_contempladas_id" class="col-form-label">Unidades Contempladas:</label>
                <select name="unidades_contempladas_id[]"
                        class="form-control select2 {{$errors->has('unidades_contempladas_id.*') ? 'is-invalid' : ''}}"
                        aria-describedby="unidadeIdFeedback">
                    <option value="">Selecione uma opção</option>'`;

        @foreach($unidadesContempladas as $unidade)
        unidade += ` <option value="{{$central->id}}">{{$unidade->nome}}</option>`;
        @endforeach
        unidade += `</select>
            </div>
           <div class="col-sm-12 col-md-1">
                    <label for="" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                    onclick="removeLinhaUnidade($(this))">
                     <i class="fas fa-solid fa-trash"></i>
                    </button>
           </div>
        </div>`;
        $(".divUnidades").append(unidade);
    }

    function removeLinhaUnidade(element) {
        element.parent().parent().remove();
        quantidadeUnidade--;
    }

    function mascaraValor() {
        $("body").find('.money').inputmask('decimal', {
            radixPoint: ",",
            groupSeparator: ".",
            // autoGroup: true,
            allowMinus: false,
            digits: 2,
            digitsOptional: false,
            rightAlign: true,
            unmaskAsNumber: true,
            removeMaskOnSubmit: true
        });
    }

    $(document).ready(function () {
        $(":input").inputmask();

        $(".money").maskMoney({
            allowNegative: true,
            thousands: '.',
            decimal: ',',
            affixesStay: false
        });
    });

</script>
@endpush
