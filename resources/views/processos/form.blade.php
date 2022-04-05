@push('css')
    <link rel="stylesheet" href="{{asset('assets/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
<!-- form start -->
<div class="card-body">
    <div class="form-group row">
        <div class="col-sm-12 col-md-4">
            <label for="sei" class="col-form-label">Sei:</label>
            <input type="text" name="nome" class="form-control {{$errors->has('sei') ? 'is-invalid' : ''}}"
                   aria-describedby="seiFeedback" value="{{@$processo->sei}}">
            @if ($errors->has('sei'))
                <div id="seiFeedback" class="invalid-feedback">
                    {{$errors->first('sei')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="edital" class="col-form-label">Nº do Edital:</label>
            <input type="text" name="edital" class="form-control {{$errors->has('edital') ? 'is-invalid' : ''}}"
                   aria-describedby="editalFeedback" value="{{@$processo->edital}}">
            @if ($errors->has('edital'))
                <div id="editalFeedback" class="invalid-feedback">
                    {{$errors->first('edital')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="data_processo" class="col-form-label">Data:</label>
            <input type="text" name="data_processo"
                   class="form-control {{$errors->has('data_processo') ? 'is-invalid' : ''}}"
                   aria-describedby="dataProcessoFeedback" value="{{@$processo->data_processo}}">
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
                    <option value="{{$objeto->id}}" @if(@$tipoGasto->objeto_id == $objeto->id) selected @endif>
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
                    <option value="{{$modalidade->id}}" @if(@$processo->modalidade_id == $modalidade->id) selected
                        @endif>
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
                @foreach($objetos as $objeto)
                    <option value="{{$objeto->id}}"
                            @if(@$processo->tecnico_responsavel_id == $objeto->id) selected @endif>
                        {{$objeto->nome}}
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
        <div class="col-sm-12 col-md-4">
            <label for="total_estimado" class="col-form-label">Valor Total Estimado:</label>
            <input type="text" name="total_estimado"
                   class="form-control {{$errors->has('total_estimado') ? 'is-invalid' : ''}}"
                   aria-describedby="totalEstimadoFeedback" value="{{@$processo->total_estimado}}">
            @if ($errors->has('total_estimado'))
                <div id="totalEstimadoFeedback" class="invalid-feedback">
                    {{$errors->first('total_estimado')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="situacao_acompanhamento_id" class="col-form-label">Situação de Acompanhamento:</label>
            <select name="situacao_acompanhamento_id"
                    class="form-control select2 {{$errors->has('situacao_acompanhamento_id') ? 'is-invalid' : ''}}"
                    aria-describedby="situacaoAcompanhamentoIdFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($objetos as $objeto)
                    <option value="{{$objeto->id}}"
                            @if(@$processo->situacao_acompanhamento_id == $objeto->id) selected @endif>
                        {{$objeto->nome}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('situacao_acompanhamento_id'))
                <div id="situacaoAcompanhamentoIdFeedback" class="invalid-feedback">
                    {{$errors->first('situacao_acompanhamento_id')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="total_homologado" class="col-form-label">Valor Total Homologado:</label>
            <input type="text" name="total_homologado"
                   class="form-control {{$errors->has('total_homologado') ? 'is-invalid' : ''}}"
                   aria-describedby="totalHomologadoFeedback" value="{{@$processo->total_homologado}}">
            @if ($errors->has('total_homologado'))
                <div id="totalHomologadoFeedback" class="invalid-feedback">
                    {{$errors->first('total_homologado')}}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-6">
            <label for="unidades_contempladas_id" class="col-form-label">Unidades Contempladas:</label>
            <select name="unidades_contempladas_id"
                    class="form-control select2 {{$errors->has('unidades_contempladas_id') ? 'is-invalid' : ''}}"
                    aria-describedby="unidadesContempladasIdFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($objetos as $objeto)
                    <option value="{{$objeto->id}}"
                            @if(@$processo->unidades_contempladas_id == $objeto->id) selected @endif>
                        {{$objeto->nome}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('unidades_contempladas_id'))
                <div id="unidadesContempladasIdFeedback" class="invalid-feedback">
                    {{$errors->first('unidades_contempladas_id')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-6">
            <label for="area_abrangencia_id" class="col-form-label">Área de Abrangência:</label>
            <select name="area_abrangencia_id"
                    class="form-control select2 {{$errors->has('modalidade_id') ? 'is-invalid' : ''}}"
                    aria-describedby="area_abrangencia_idFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($modalidades as $modalidade)
                    <option value="{{$modalidade->id}}" @if(@$processo->modalidade_id == $modalidade->id) selected
                        @endif>
                        {{$modalidade->nome}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('area_abrangencia_id'))
                <div id="area_abrangencia_idFeedback" class="invalid-feedback">
                    {{$errors->first('area_abrangencia_id')}}
                </div>
            @endif
        </div>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Tipos de Gastos</h3>
    </div>
    <div class="card-body">
        <div class="divTipoGasto">
            <div class="form-group row">
                <div class="col-sm-12 col-md-4">
                    <label for="tipos_gastos_id" class="col-form-label">Tipo de Gasto:</label>
                    <select name="tipos_gastos_id[]"
                            class="form-control select2 {{$errors->has('tipos_gastos_id') ? 'is-invalid' : ''}}"
                            aria-describedby="tiposGastosIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($tiposGastos as $tipoGasto)
                            <option value="{{$tipoGasto->id}}"
                                    @if(@$processo->tipos_gastos_id == $tipoGasto->id) selected
                                @endif>
                                {{$modalidade->nome}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('tipos_gastos_id'))
                        <div id="tiposGastosIdFeedback" class="invalid-feedback">
                            {{$errors->first('tipos_gastos_id')}}
                        </div>
                    @endif
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="valor_tipo_gasto" class="col-form-label">Valor do Tipo de Gasto:</label>
                    <input type="text" name="valor_tipo_gasto"
                           class="form-control {{$errors->has('valor_tipo_gasto') ? 'is-invalid' : ''}}"
                           aria-describedby="valorTipoGastoFeedback" value="{{@$tipoGasto->nome}}">
                    @if ($errors->has('valor_tipo_gasto'))
                        <div id="valorTipoGastoFeedback" class="invalid-feedback">
                            {{$errors->first('valor_tipo_gasto')}}
                        </div>
                    @endif
                </div>
            </div>
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
        <h3 class="card-title">Centrais de Atendimento</h3>
    </div>
    <div class="card-body ">
        <div class="divCentral">
            <div class="form-group row">
                <div class="col-sm-12 col-md-8">
                    <label for="central_id" class="col-form-label">Central de Atendimento:</label>
                    <select name="central_id[]"
                            class="form-control select2 {{$errors->has('central_id') ? 'is-invalid' : ''}}"
                            aria-describedby="centralIdFeedback">
                        <option value="">Selecione uma opção</option>
                        @foreach($modalidades as $modalidade)
                            <option value="{{$modalidade->id}}"
                                    @if(@$processo->central_id == $modalidade->id) selected
                                @endif>
                                {{$modalidade->nome}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('central_id'))
                        <div id="centralIdFeedback" class="invalid-feedback">
                            {{$errors->first('central_id')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <button type="button" class="btn btn-primary btn-flat" onclick="addCentral()">+</button>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
@push('js')
    <script src="{{asset('assets/select2/js/select2.full.js')}}"></script>
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
                    <label for="nome" class="col-form-label">Tipo de Gasto:</label>
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
            <input type="text" name="valor_tipo_gasto"
            class="form-control " aria-describedby="valorTipoGastoFeedback" value="">
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
        }

        function removeLinhaTipoGasto(element) {
            element.parent().parent().remove();
            quantidadeTipoGasto--;
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

            @foreach($modalidades as $modalidade)
                central += ` <option value="{{$modalidade->id}}"
                        @if(@$processo->modalidade_id == $modalidade->id) selected  @endif>
                            {{$modalidade->nome}}
            </option>`;
            @endforeach
                central += `</select>
            </div>
           <div class="col-sm-12 col-md-1">
                    <label for="valor_tipo_gasto" class="col-form-label">&emsp;</label>
                    <button type="button" class="btn btn-danger btn-flat form-control"
                    onclick="removeLinha($(this))">
                     <i class="fas fa-solid fa-trash"></i>
                    </button>
           </div>
        </div>`;
            $(".divCentral").append(central);
        }

    </script>
@endpush
