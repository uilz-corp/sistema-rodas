    <div class="row justify-content-center">
        @include('layout.formulario.input', ['class' => 'col-11','input' => 'nome', 'attributes' => [
            'data-validation' => 'required',
            'data-validation-error-msg' => 'Insira o nome do usuário.',
            'class' => 'form-control', 'placeholder' => 'Nome completo']
        ])
    </div>
    <div class="row justify-content-center">
        @include('layout.formulario.email', ['class' => 'col-11', 'input' => 'email', 'attributes' => [
            'data-validation' => 'email', 
            'data-validation-error-msg' => 'O e-mail é inválido.',
            'class' => 'form-control', 'placeholder' => 'E-mail'
        ]])
    </div>
    <div class="row justify-content-center">
        {{--  <label class="col-5 input">
            <select name="genero" class="form-control blur-border-effect">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </label>  --}}
        @include('layout.formulario.password', ['class' => 'col-5', 'input' => 'senha', 'attributes' => [
            'data-validation' => 'required',
            'data-validation-error-msg' => 'Este campo é obrigatório.',
            'class' => 'form-control', 'placeholder' => 'Senha'
        ]])

        @include('layout.formulario.input', ['class' => 'col-6', 'input' => 'cpf', 'attributes' => [
            'data-validation' => 'length',
            'data-validation-length' => "min14",
            'data-validation-error-msg' => 'O CPF está incorreto.',
            'class' => 'form-control', 'placeholder' => 'CPF'
        ]])
    </div>
    <div class="row justify-content-center">
        @include('layout.formulario.input', ['class' => 'col-6','input' => 'perfil', 'attributes' => [
            'data-validation' => 'required',
            'data-validation-error-msg' => 'Este campo é obrigatório.',
            'class' => 'form-control', 'placeholder' => 'Perfil'
        ]])
        @include('layout.formulario.input', ['class' => 'col-5','input' => 'permissao', 'attributes' => [
            'data-validation' => 'required',
            'data-validation-error-msg' => 'Este campo é obrigatório.',
            'class' => 'form-control', 'placeholder' => 'Permissão'
        ]])
    </div>
    {{--  <div class="row justify-content-center">
        @include('layout.formulario.input', ['class' => 'col-11','input' => 'data_nasc', 'attributes' => [
            'data-validation' => 'length',
            'data-validation-length' => "min10",
            'data-validation-error-msg' => 'Este campo é obrigatório.',
            'class' => 'form-control', 'placeholder' => 'Data de nascimento'
        ]])
    </div>  --}}
    