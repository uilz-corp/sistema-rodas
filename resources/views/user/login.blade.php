
@include('layout/head')

<div class="container">
    <div class="vertical-align">
        <div class="row">
            <div class="col text-center">
                <img class="mw-100" src="{{ asset('images/logo-ac.png') }}" />    
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="loading spinner-border spinner-border-sm" role="status" aria-hidden="true"></div>
            <div id="messagesDiv" hidden class="col col-md-3 text-center alert alert-danger" role="alert">
            </div>
        </div>

        <div class="row justify-content-center">
        {!! Form::open(['route' => 'auth.login', 'method' => 'post', 'id' => 'form-login-user']) !!}
                <div class="col">
                    @include('layout.formulario.input', ['input' => 'username', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'Usuário']])
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