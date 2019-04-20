
@include('layout/head')

<div class="container">
    <div class="vertical-align">
        <div class="row">
            <div class="col text-center">
                <img class="mw-100" src="{{ asset('images/logo-ac.png') }}" />    
            </div>
        </div>

        <div class="row justify-content-center">
            @if(session('success'))
                <h3>{{ session('success')['messages'] }}</h3>
            @endif

            {!! Form::open(['route' => 'auth.login', 'method' => 'post']) !!}
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