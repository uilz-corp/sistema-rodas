
@include('layout/head')

<div class="container">
    <div class="vertical-align">
        <div class="row">
            <div class="col text-center">
                <img class="mw-100" src="{{ asset('images/logo-ac.png') }}" />    
            </div>
        </div>

        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="row text-center justify-content-center">
            <span class="ac-color help-block">
                <strong>Enviaremos um e-mail para que você possa redefinir sua senha.</strong>
            </span>
        </div>
        <br>
        <div class="row justify-content-center">
            {!! Form::open(['route' => 'auth.email', 'class'=>'col-12', 'method' => 'post', 'id' => 'form-reset-password']) !!}
                <div class="col text-center">
                    @include('layout.formulario.input', ['class' => 'col-12 col-md-6', 'id' => 'email', 'input' => 'email', 'attributes' => 
                    ['class' => 'form-control', 'placeholder' => 'E-mail', 'value' => '{{ old(\'email\') }}'],
                    'required' => 'true'])
                </div>
                @if ($errors->has('email'))
                <div class="col text-center">
                    <span style="color:#a46268" class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                </div>
                @endif
                <br>
                <div class="col text-center">
                    @include('layout.formulario.submit', ['input' => 'Receber e-mail', 'attributes' => 
                        ['class' => 'btn-lg btn btn-outline-primary ac-colors', 'onclick' => 'loading()']])
                </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>

@include('layout/footer')