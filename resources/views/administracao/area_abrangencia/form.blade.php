<!-- form start -->
<div class="card-body">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}"
               name="nome" id="nome" placeholder="Nome" aria-describedby="nomeFeedback"
               value="{{old('nome', @$categoriaVeiculo->nome)}}">
        @if ($errors->has('nome'))
            <div id="nomeFeedback" class="invalid-feedback">
                {{$errors->first('nome')}}
            </div>
        @endif

        @if (count($errors->all()) > 1)
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

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
