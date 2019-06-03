<input hidden name="id" value="" />
<div class="row justify-content-center">
    @include('layout.formulario.input', ['class' => 'col-12','input' => 'descricao', 'attributes' => 
    ['data-validation'=>'required','class' => 'form-control', 'placeholder' => 'Descrição']])
</div>
<div class="row justify-content-center">
    <label class="col-12 input">
        <span>Polo</span>
        <select data-validation="required" name="tipo_polo" class="form-control blur-border-effect">
            @foreach ($tipo_polos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
            @endforeach
        </select>
    </label>
</div>
