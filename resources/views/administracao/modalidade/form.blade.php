<!-- form start -->
<div class="card-body">
    <div class="form-group row">
        <div class="col-sm-12 col-md-5">
            <label for="modalidade" class="col-form-label">Modalidade:</label>
            <input type="text" name="modalidade" class="form-control {{$errors->has('modalidade') ? 'is-invalid' : ''}}"
                   aria-describedby="modalidadeFeedback" value="{{@$modalidade->modalidade}}">
            @if ($errors->has('modalidade'))
                <div id="modalidadeFeedback" class="invalid-feedback">
                    {{$errors->first('modalidade')}}
                </div>
            @endif



            @if (count($errors->all()) > 0)
                <div id="modalidadeFeedback" class="invalid-feedback">
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
