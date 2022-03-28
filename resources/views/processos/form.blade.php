@push('css')
    <link rel="stylesheet" href="{{asset('assets/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
<!-- form start -->
<div class="card-body">
    <div class="form-group row">
        <div class="col-sm-12 col-md-4">
            <label for="nome" class="col-form-label">Sei:</label>
            <input type="text" name="nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}"
                   aria-describedby="nomeFeedback" value="{{@$tipoGasto->nome}}">
            @if ($errors->has('nome'))
                <div id="nomeFeedback" class="invalid-feedback">
                    {{$errors->first('nome')}}
                </div>
            @endif

            @if (count($errors->all()) > 0)
                <div id="nomeFeedback" class="invalid-feedback">
                    @foreach($errors->all() as $error)
                        @if (!$loop->first)
                            {{$error}}<br>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="edital" class="col-form-label">Nº do Edital:</label>
            <input type="text" name="edital" class="form-control {{$errors->has('edital') ? 'is-invalid' : ''}}"
                   aria-describedby="editalFeedback" value="{{@$tipoGasto->nome}}">
            @if ($errors->has('edital'))
                <div id="editalFeedback" class="invalid-feedback">
                    {{$errors->first('edital')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="data" class="col-form-label">Data:</label>
            <input type="text" name="data" class="form-control {{$errors->has('data') ? 'is-invalid' : ''}}"
                   aria-describedby="dataFeedback" value="{{@$tipoGasto->nome}}">
            @if ($errors->has('data'))
                <div id="dataFeedback" class="invalid-feedback">
                    {{$errors->first('data')}}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-4">
            <label for="objeto_id" class="col-form-label">Objeto:</label>
            <select name="objeto_id" class="form-control select2">
                <option value="">Selecione uma opção</option>
                @foreach($objetos as $objeto)
                    <option value="{{$objeto->id}}" @if(@$tipoGasto->objeto_id == $objeto->id) selected @endif>
                        {{$objeto->nome}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('objeto_id'))
                <div id="objeto_idFeedback" class="invalid-feedback">
                    {{$errors->first('objeto_id')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="modalidade_id" class="col-form-label">Modalidade:</label>
            <select name="modalidade_id"
                    class="form-control select2 {{$errors->has('modalidade_id') ? 'is-invalid' : ''}}"
                    aria-describedby="modalidade_idFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($modalidades as $modalidade)
                    <option value="{{$modalidade->id}}" @if(@$processo->modalidade_id == $modalidade->id) selected
                        @endif>
                        {{$modalidade->nome}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('modalidade_id'))
                <div id="modalidade_idFeedback" class="invalid-feedback">
                    {{$errors->first('modalidade_id')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="objeto_id" class="col-form-label">Técnico Responsável:</label>
            <select name="objeto_id" class="form-control select2">
                <option value="">Selecione uma opção</option>
                @foreach($objetos as $objeto)
                    <option value="{{$objeto->id}}" @if(@$tipoGasto->objeto_id == $objeto->id) selected @endif>
                        {{$objeto->nome}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('objeto_id'))
                <div id="objeto_idFeedback" class="invalid-feedback">
                    {{$errors->first('objeto_id')}}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-4">
            <label for="total_estimado" class="col-form-label">Valor Total Estimado:</label>
            <input type="text" name="total_estimado"
                   class="form-control {{$errors->has('total_estimado') ? 'is-invalid' : ''}}"
                   aria-describedby="totalEstimadoFeedback" value="{{@$tipoGasto->nome}}">
            @if ($errors->has('total_estimado'))
                <div id="totalEstimadoFeedback" class="invalid-feedback">
                    {{$errors->first('total_estimado')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-4">
            <label for="unidades_contempladas_id" class="col-form-label">Situação de Acompanhamento:*</label>
            <select name="unidades_contempladas_id"
                    class="form-control select2 {{$errors->has('unidades_contempladas_id') ? 'is-invalid' : ''}}"
                    aria-describedby="unidadesContempladasIdFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($objetos as $objeto)
                    <option value="{{$objeto->id}}" @if(@$tipoGasto->objeto_id == $objeto->id) selected @endif>
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

        <div class="col-sm-12 col-md-4">
            <label for="unidades_contempladas_id" class="col-form-label">Valor Total Homologado:</label>
            <input type="text" name="unidades_contempladas_id"
                   class="form-control {{$errors->has('unidades_contempladas_id') ? 'is-invalid' : ''}}"
                   aria-describedby="unidadeContempladasFeedback" value="{{@$tipoGasto->nome}}">
            @if ($errors->has('unidades_contempladas_id'))
                <div id="unidadeContempladasFeedback" class="invalid-feedback">
                    {{$errors->first('unidades_contempladas_id')}}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-6">
            <label for="unidades_contempladas_id" class="col-form-label">Unidades Contempladas:</label>
            <select name="unidades_contempladas_id"
                    class="form-control select2 {{$errors->has('unidades_contempladas_id') ? 'is-invalid' : ''}}">
                <option value="">Selecione uma opção</option>
                @foreach($objetos as $objeto)
                    <option value="{{$objeto->id}}" @if(@$tipoGasto->objeto_id == $objeto->id) selected @endif>
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
        <div class="form-group row">
            <div class="col-sm-12 col-md-4">
                <label for="nome" class="col-form-label">Tipo de Gasto:</label>
                <input type="text" name="nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}"
                       aria-describedby="nomeFeedback" value="{{@$tipoGasto->nome}}">
                @if ($errors->has('nome'))
                    <div id="nomeFeedback" class="invalid-feedback">
                        {{$errors->first('nome')}}
                    </div>
                @endif

                @if (count($errors->all()) > 0)
                    <div id="nomeFeedback" class="invalid-feedback">
                        @foreach($errors->all() as $error)
                            @if (!$loop->first)
                                {{$error}}<br>
                            @endif
                        @endforeach
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
    </script>
@endpush
