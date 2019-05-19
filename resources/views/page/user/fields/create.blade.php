    <div class="row justify-content-center">
        @include('layout.formulario.input', ['class' => 'col-11','input' => 'nome', 'attributes' => 
        ['class' => 'form-control', 'placeholder' => 'Nome']])
    </div>
    <div class="row justify-content-center">
        @include('layout.formulario.email', ['class' => 'col-11', 'input' => 'email',
        'attributes' => ['class' => 'form-control', 'placeholder' => 'E-mail']])
    </div>
    <div class="row justify-content-center">
        @include('layout.formulario.input', ['class' => 'col-3','input' => 'genero', 'attributes' => 
        ['class' => 'form-control', 'placeholder' => 'Gênero']])
        @include('layout.formulario.input', ['class' => 'col-8', 'input' => 'cpf',
            'attributes' => ['class' => 'form-control', 'placeholder' => 'CPF']])
    </div>
    <div class="row justify-content-center">
        @include('layout.formulario.password', ['class' => 'col-11', 'input' => 'senha',
            'attributes' => ['class' => 'form-control', 'placeholder' => 'Senha']])
    </div>
    <div class="row justify-content-center">
        @include('layout.formulario.input', ['class' => 'col-6','input' => 'perfil', 'attributes' => 
        ['class' => 'form-control', 'placeholder' => 'Perfil']])
        @include('layout.formulario.input', ['class' => 'col-5','input' => 'permissao', 'attributes' => 
        ['class' => 'form-control', 'placeholder' => 'Permissão']])
    </div>
    <div class="row justify-content-center">
        @include('layout.formulario.input', ['class' => 'col-11','input' => 'data_nasc', 'attributes' => 
        ['class' => 'form-control', 'placeholder' => 'Data de nascimento']])
    </div>
    