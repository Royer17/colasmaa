@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                {{--     
                <div class="panel-heading">Login</div>
                --}}
                <h4>Bienvenido al Panel de Administración</h4>

                <div class="panel-body">


                    @if (session()->has('data'))
                        <p class="login-box-msg u-color-error u-primary">{{ session()->get('data')[0] }}</p>
                    @endif


                    <form class="form-horizontal" method="POST" action="/login">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Ingresa tu Usuario">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Ingresa tu Contraseña">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </div>

                        {{-- 
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        --}}
                        {{-- 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        --}}

                        {{-- 

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        --}}

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
