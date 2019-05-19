
@include('layout/head')

<div class="container">
    <div class="vertical-align">
        <div class="row">
            <div class="col text-center">
                <img class="mw-100" src="{{ asset('images/logo-ac.png') }}" />    
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div id="messagesDiv" hidden class="col col-md-3 text-center alert alert-danger" role="alert">
            </div>
        </div>

        <div class="row justify-content-center">
        {!! Form::open(['route' => 'auth.login', 'method' => 'post', 'id' => 'form-login-user']) !!}
                <div class="col">
                    @include('layout.formulario.input', ['input' => 'cpf', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'CPF']])
                </div>
                <div class="col">
                    @include('layout.formulario.password', ['input' => 'password',
                        'attributes' => ['class' => 'form-control', 'placeholder' => 'Senha']])
                </div>
                <br>
                <div class="col text-center">
                    @include('layout.formulario.submit', ['input' => 'Enviar', 'attributes' => 
                        ['class' => 'btn-lg btn btn-outline-primary ac-colors']])
                </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>

@include('layout/footer')