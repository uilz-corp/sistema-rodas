@include('layout/head')

<div class="container">
    <div class="vertical-align">
        <div class="row mb-4">
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


        {!! Form::open(['route' => 'auth.forget', 'class'=>'col-12', 'method' => 'post', 'id' => 'form-redefine-password']) !!}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="text-center form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col">
                                @include('layout.formulario.input', ['class' => 'col-12 col-md-6 control-label', 'id' => 'email', 'input' => 'email', 'attributes' => 
                                ['class' => 'form-control', 'required' => 'true', 'autofocus' => 'true', 'placeholder' => 'E-mail', 'name' => 'email', 'value' => '{{ $email or old(\'email\') }}'],
                                'required' => 'true'])
                            </div>
                            @if ($errors->has('email'))
                                <span style="color:#a46268" class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                            {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input  type="email" class="form-control" name="email" value="" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
                            
                        </div>

                        <div class="text-center form-group{{ $errors->has('senha') ? ' has-error' : '' }}">

                            <div class="col">
                                @include('layout.formulario.password', ['class' => 'col-12 col-md-6 control-label', 'id' => 'senha', 'input' => 'password', 'attributes' => 
                                ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Senha', 'name' => 'senha'],
                                'required' => 'true'])
                            </div>
                            @if ($errors->has('password'))
                                <span style="color:#a46268" class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif


                            {{-- <label for="senha" class="col-md-4 control-label">senha</label>

                            <div class="col-md-6">
                                <input id="senha" type="senha" class="form-control" name="senha" required>

                                @if ($errors->has('senha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
                        </div>



                        <div class="text-center form-group{{ $errors->has('senha_confirmation') ? ' has-error' : '' }}">

                                <div class="col">
                                    @include('layout.formulario.password', ['class' => 'col-12 col-md-6 control-label', 'id' => 'senha-confirm', 'input' => 'password', 'attributes' => 
                                    ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Confirme sua senha', 'name' => 'senha_confirmation'],
                                    'required' => 'true'])
                                </div>

                                @if ($errors->has('senha_confirmation'))
                                    <span style="color:#a46268" class="help-block">
                                        <strong>{{ $errors->first('senha_confirmation') }}</strong>
                                    </span>
                                @endif

                            {{-- <div class="col-md-6">
                                <input id="senha-confirm" type="senha" class="form-control" name="senha_confirmation" required>

                                @if ($errors->has('senha_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('senha_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
                        </div>

                        {{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Redefinir senha
                                </button>
                            </div>
                        </div> --}}
                        <br>
                        <div class="form-group">
                            <div class="col text-center">
                                @include('layout.formulario.submit', ['input' => 'Redefinir senha', 'attributes' => 
                                    ['class' => 'btn-lg btn btn-outline-primary ac-colors', 'onclick' => 'loading()']])
                            </div>
                        </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@include('layout/footer')