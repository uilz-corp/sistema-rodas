@include('layout/head')

<div class="container">
    <div class="vertical-align">
    <div class="row justify-content-center">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Reset senha</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.forget') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                            <label for="senha" class="col-md-4 control-label">senha</label>

                            <div class="col-md-6">
                                <input id="senha" type="senha" class="form-control" name="senha" required>

                                @if ($errors->has('senha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('senha_confirmation') ? ' has-error' : '' }}">
                            <label for="senha-confirm" class="col-md-4 control-label">Confirm senha</label>
                            <div class="col-md-6">
                                <input id="senha-confirm" type="senha" class="form-control" name="senha_confirmation" required>

                                @if ($errors->has('senha_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('senha_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset senha
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@include('layout/footer')