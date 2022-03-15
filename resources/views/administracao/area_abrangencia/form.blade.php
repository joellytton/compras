@push('css')
    <link rel="stylesheet" href="{{asset('assets/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
<!-- form start -->
<div class="card-body">
    <div class="form-group row">
        <div class="col-sm-12 col-md-5">
            <label for="cidade_id" class="col-form-label">Cidade:</label>
            <select name="cidade_id" class="form-control select2 {{$errors->has('cidade_id') ? 'is-invalid' : ''}}"
                    aria-describedby="nomeFeedback" style="width: 100%;">
                <option value="">Selecione uma opção</option>
                @foreach($cidades as $cidade)
                    <option value="{{$cidade->id}}"
                        {{(empty(old('cidade_id')) ? @$areaAbrangencia->cidade_id : old('cidade_id')) == $cidade->id
                        ? 'selected' : ''}}>
                        {{$cidade->nome}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('cidade_id'))
                <div id="nomeFeedback" class="invalid-feedback">
                    {{$errors->first('cidade_id')}}
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
