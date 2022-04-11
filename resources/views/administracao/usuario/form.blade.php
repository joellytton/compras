<!-- form start -->
<div class="card-body">
    <div class="form-group row">
        <div class="col-sm-12 col-md-6">
            <label for="name" class="col-form-label">Nome:</label>
            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                   aria-describedby="nameFeedback" value="{{empty(old('name')) ? @$usuario->name : old('name')}}">
            @if ($errors->has('name'))
                <div id="nameFeedback" class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-6">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                   aria-describedby="emailFeedback" value="{{empty(old('email')) ? @$usuario->email : old('email')}}">
            @if ($errors->has('email'))
                <div id="emailFeedback" class="invalid-feedback">
                    {{$errors->first('email')}}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-3">
            <label for="cpf" class="col-form-label">Cpf:</label>
            <input type="text" name="cpf" class="form-control {{$errors->has('cpf') ? 'is-invalid' : ''}}"
                   aria-describedby="cpfFeedback"
                   value="{{empty(old('cpf')) ? @$usuario->pessoaFisica->cpf : old('cpf')}}"
                   data-inputmask='"mask": "999.999.999-99"' data-mask>
            @if ($errors->has('cpf'))
                <div id="cpfFeedback" class="invalid-feedback">
                    {{$errors->first('cpf')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-3">
            <label for="rg" class="col-form-label">Rg:</label>
            <input type="text" name="rg" class="form-control {{$errors->has('rg') ? 'is-invalid' : ''}}"
                   aria-describedby="rgFeedback" value="{{empty(old('rg')) ? @$usuario->pessoaFisica->rg : old('rg')}}">
            @if ($errors->has('rg'))
                <div id="rgFeedback" class="invalid-feedback">
                    {{$errors->first('rg')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-3">
            <label for="data_nascimento" class="col-form-label">Data de Nascimento:</label>
            <input type="text" name="data_nascimento"
                   class="form-control {{$errors->has('data_nascimento') ? 'is-invalid' : ''}}"
                   aria-describedby="dataNascimentoFeedback" value="{{empty(old('data_nascimento')) ?
                   @$usuario->pessoaFisica->data_nascimento : old('data_nascimento')}}"
                   data-inputmask='"mask": "99/99/9999"'
                   data-mask>
            @if ($errors->has('data_nascimento'))
                <div id="dataNascimentoFeedback" class="invalid-feedback">
                    {{$errors->first('data_nascimento')}}
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-3">
            <label for="sexo" class="col-form-label">Sexo:</label>
            <select name="sexo" class="form-control select2 {{$errors->has('sexo') ? 'is-invalid' : ''}}"
                    aria-describedby="sexoIdFeedback">
                <option value="">Selecione uma opção</option>
                <option
                    value="masculino" {{(empty(old('sexo')) ? @$usuario->pessoaFisica->sexo : old('sexo')) == 'masculino' ? 'selected' : ''}}>
                    Masculino
                </option>

                <option
                    value="feminino"{{(empty(old('sexo')) ? @$usuario->pessoaFisica->sexo : old('sexo')) == 'feminino' ? 'selected' : ''}}>
                    Feminino
                </option>
            </select>
            @if ($errors->has('sexo'))
                <div id="sexoIdFeedback" class="invalid-feedback">
                    {{$errors->first('sexo')}}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 col-md-3">
            <label for="perfil_id" class="col-form-label">Perfil:</label>
            <select name="perfil_id" class="form-control select2 {{$errors->has('perfil_id') ? 'is-invalid' : ''}}"
                    aria-describedby="perfilIdFeedback">
                <option value="">Selecione uma opção</option>
                @foreach($perfis as $perfil)
                    <option value="{{$perfil->id}}" {{(empty(old('perfil_id')) ?
                        @$usuario->perfil_id : old('perfil_id')) == $perfil->id ? 'selected' : ''}}>
                        {{$perfil->nome}}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('sexo'))
                <div id="sexoIdFeedback" class="invalid-feedback">
                    {{$errors->first('sexo')}}
                </div>
            @endif
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="button" class="btn btn-primary" onclick="submitForm(this);">Salvar</button>
</div>

@push('js')
    <script>
        $('[data-mask]').inputmask();
    </script>
@endpush
