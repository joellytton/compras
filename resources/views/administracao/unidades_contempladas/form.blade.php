<!-- form start -->
<div class="card-body">
    <div class="form-group row">
        <div class="col-sm-12 col-md-5">
            <label for="nome" class="col-form-label">Unidade Contemplada:</label>
            <input type="text" name="nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}"
                   aria-describedby="nomeFeedback" value="{{@$unidadeContempladas->nome}}">
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
    </div>
</div>

<div class="card-footer">
    <button type="button" class="btn btn-primary" onclick="submitForm(this);">Salvar</button>
</div>
