<input hidden name="id" value="" />
<div class="row justify-content-center">
    @include('layout.formulario.input', ['label' => 'Nome completo',
    'class' => 'col-11','input' => 'nome', 'attributes' => [
        'disabled' => 'true',
        'data-validation' => 'alphanumeric',
        'data-validation-error-msg' => 'Insira o nome do usuário.',
        'class' => 'form-control', 'placeholder' => 'Nome'
    ]])
</div>
<div class="row justify-content-center">
    @include('layout.formulario.email', ['label' => 'E-mail',
    'class' => 'col-11', 'input' => 'email', 'attributes' => [
        'data-validation' => 'email', 
        'data-validation-error-msg' => 'O e-mail é inválido.',
        'class' => 'form-control', 'placeholder' => 'E-mail'
    ]])
</div>
{{--  <div class="row justify-content-center">
    <label class="col-3 col-md-5 input">
        <span>Gênero</span>
        <select name="genero" data-validation="required" class="form-control blur-border-effect">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
    </label>

    @include('layout.formulario.input', ['class' => 'col-8 col-md-6',
    'label' => 'Data de nascimento', 'input' => 'data_nasc', 'attributes' => 
    ['disabled' => 'true', 'class' => 'form-control', 'placeholder' => 'Data de nascimento']])
</div>  --}}
<div class="row justify-content-center">
    <label class="col-6 input">
        <span>Formação</span>
        <select name="formacao" data-validation="required" class="form-control blur-border-effect">
            <option value="SE">Sem escolaridade</option>
            <option value="EI">Ensino Infantil</option>
            <option value="EF">Ensino Fundamental</option>
            <option value="EM">Ensino Médio</option>
            <option value="ES">Ensino Superior</option>
        </select>
    </label>

    @include('layout.formulario.input', ['label' => 'CPF',
    'class' => 'col-5', 'input' => 'cpf',
    'attributes' => ['class' => 'form-control', 'disabled' => 'true', 'placeholder' => 'CPF']])
</div>
<div class="row justify-content-center">
    @include('layout.formulario.input', ['label' => 'Perfil',
    'class' => 'col-6','input' => 'perfil', 'attributes' => [
        'data-validation' => 'required',
        'class' => 'form-control', 'placeholder' => 'Perfil'
    ]])
    @include('layout.formulario.input', ['label' => 'Permissão',
    'class' => 'col-5','input' => 'permissao', 'attributes' => [
        'data-validation' => 'required',
        'class' => 'form-control', 'placeholder' => 'Permissão'
    ]])
</div>
<div class="row justify-content-center">
    <label class="col-11 input">
        <span>Polo</span>
        <select data-validation="required" name="id_polo" class="form-control blur-border-effect">
            @foreach ($polos as $polo)
                <option value="{{ $polo->id }}">{{ $polo->descricao }}</option>
            @endforeach
        </select>
    </label>
</div>
