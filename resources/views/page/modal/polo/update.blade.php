<input hidden name="id" value="" />
<div class="row justify-content-center">
    @include('layout.formulario.input', ['label' => 'Nome completo',
    'class' => 'col-11','input' => 'name', 'attributes' => 
    ['class' => 'form-control', 'placeholder' => 'Nome']])
</div>
<div class="row justify-content-center">
    @include('layout.formulario.email', ['label' => 'E-mail',
    'class' => 'col-11', 'input' => 'email',
    'attributes' => ['class' => 'form-control', 'placeholder' => 'E-mail']])
</div>
<div class="row justify-content-center">
    @include('layout.formulario.input', ['label' => 'Gênero',
    'class' => 'col-3','input' => 'gender', 'attributes' => 
    ['class' => 'form-control', 'placeholder' => 'Gênero']])
    @include('layout.formulario.input', ['label' => 'CPF',
    'class' => 'col-8', 'input' => 'cpf',
    'attributes' => ['class' => 'form-control', 'placeholder' => 'CPF']])
</div>
<div class="row justify-content-center">
    @include('layout.formulario.input', ['label' => 'Usuário',
    'class' => 'col-11 col-md-6','input' => 'username', 'attributes' => 
    ['class' => 'form-control', 'placeholder' => 'Usuário']])
    @include('layout.formulario.input', ['class' => 'col-11 col-md-5',
    'label' => 'Data de nascimento', 'input' => 'birth', 'attributes' => 
    ['class' => 'form-control', 'placeholder' => 'Data de nascimento']])
</div>
<div class="row justify-content-center">
    @include('layout.formulario.input', ['label' => 'Perfil',
    'class' => 'col-6','input' => 'profile', 'attributes' => 
    ['class' => 'form-control', 'placeholder' => 'Perfil']])
    @include('layout.formulario.input', ['label' => 'Permissão',
    'class' => 'col-5','input' => 'permission', 'attributes' => 
    ['class' => 'form-control', 'placeholder' => 'Permissão']])
</div>