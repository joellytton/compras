@push('css')
<link rel="stylesheet" href="{{asset('assets/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
<!-- form start -->
<div class="card-body">
    <div class="form-group row">
        <div class="col-sm-12 col-md-5">
            <label for="nome" class="col-form-label">Ação/Convênio:</label>
            <input type="text" name="nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}"
                aria-describedby="nomeFeedback" value="{{empty(old('nome')) ? @$acaoConvenio->nome : old('nome')}}">
            @if ($errors->has('nome'))
            <div id="nomeFeedback" class="invalid-feedback">
                {{$errors->first('nome')}}
            </div>
            @endif
        </div>
        <div class="col-sm-12 col-md-5">
            <label for="tipo" class="col-form-label">Tipo:</label>{{@$acaoConvenio->tipo}}
            <select name="tipo" class="form-control {{$errors->has('tipo') ? 'is-invalid' : ''}}">
                <option value="">Selecione uma opção</option>
                <option value="acao"
                    {{(empty(old('tipo')) ? @$acaoConvenio->tipo : old('tipo')) == 'acao' ? 'selected' : ''}}>
                    Ação
                </option>
                <option value="convenio"
                    {{(empty(old('tipo')) ? @$acaoConvenio->tipo : old('tipo')) == 'convenio' ? 'selected' : ''}}>
                    Convênio
                </option>
            </select>
            @if ($errors->has('tipo'))
            <div id="tipoFeedback" class="invalid-feedback">
                {{$errors->first('tipo')}}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="button" class="btn btn-primary" onclick="event.preventDefault(); submitForm(this);">Salvar</button>
</div>
@push('js')
<script src="{{asset('assets/select2/js/select2.full.js')}}"></script>
<script>
    $('.select2').select2({
        theme: 'bootstrap4'
    });

</script>
@endpush
