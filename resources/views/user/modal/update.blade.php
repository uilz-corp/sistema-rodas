<div class="modal fade" id="modal-update-user" tabindex="-1" role="dialog" aria-labelledby="updateUser" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Editar usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row justify-content-center">
            {{--  @if(session('success'))
                <h3>{{ session('success')['messages'] }}</h3>
            @endif  --}}

            {!! Form::open(['route' => 'users.update', 'method' => 'put', 'id' => 'form-update-user', 'id' => 'form-update-user']) !!}
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
        </div>
    </div>
    <div class="modal-footer">
        <label>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </label>
        @include('layout.formulario.submit', ['input' => 'Editar', 'attributes' => 
            ['class' => 'btn btn-primary']])
    </div>
    {!! Form::close() !!}
    </div>
</div>
</div>