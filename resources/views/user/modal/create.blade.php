<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUser" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Cadastrar usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row justify-content-center">
            @if(session('success'))
                <h3>{{ session('success')['messages'] }}</h3>
            @endif

            {!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}
                <div class="row justify-content-center">
                    @include('layout.formulario.input', ['class' => 'col-11','input' => 'name', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'Nome']])
                </div>
                <div class="row justify-content-center">
                    @include('layout.formulario.email', ['class' => 'col-11', 'input' => 'email',
                    'attributes' => ['class' => 'form-control', 'placeholder' => 'E-mail']])
                </div>
                <div class="row justify-content-center">
                    @include('layout.formulario.input', ['class' => 'col-3','input' => 'gender', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'Gênero']])
                    @include('layout.formulario.input', ['class' => 'col-8', 'input' => 'cpf',
                        'attributes' => ['class' => 'form-control', 'placeholder' => 'CPF']])
                </div>
                <div class="row justify-content-center">
                    @include('layout.formulario.input', ['class' => 'col-5','input' => 'username', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'Usuário']])
                    @include('layout.formulario.password', ['class' => 'col-6', 'input' => 'password',
                        'attributes' => ['class' => 'form-control', 'placeholder' => 'Senha']])
                </div>
                <div class="row justify-content-center">
                    @include('layout.formulario.input', ['class' => 'col-6','input' => 'profile', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'Perfil']])
                    @include('layout.formulario.input', ['class' => 'col-5','input' => 'permission', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'Permissão']])
                </div>
                <div class="row justify-content-center">
                    @include('layout.formulario.input', ['class' => 'col-11','input' => 'birth', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'Data de nascimento']])
                </div>
        </div>
    </div>
    <div class="modal-footer">
        <label>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </label>
        @include('layout.formulario.submit', ['input' => 'Cadastrar', 'attributes' => 
            ['class' => 'btn btn-success']])
    </div>
    {!! Form::close() !!}
    </div>
</div>
</div>