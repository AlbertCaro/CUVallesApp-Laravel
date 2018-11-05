@extends('layouts.auth')

@section('form')
    <div class="text-center text-muted mb-4">
        <small>Ingrese sus credenciales</small>
    </div>
    <form role="form" action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <div class="input-group input-group-alternative {{ $errors->has('email') ? 'has-danger': '' }}">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       placeholder="Correo electrónico" type="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-alternative {{ $errors->has('password') ? 'has-danger': '' }}">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       placeholder="Contraseña" type="password">
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="custom-control custom-control-alternative custom-checkbox">
            <input class="custom-control-input" name="remember" id="remember" type="checkbox"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="remember">
                <span class="text-muted">Recuérdame</span>
            </label>
        </div>

        <div class="text-center">
            <input type="submit" class="btn btn-primary my-4" value="Iniciar sesión">
        </div>
    </form>
@endsection

@section('form-bottom')
    <div class="col-6">
        <a href="{{ route('password.request') }}" class="text-light"><small>Olvidé mi contraseña</small></a>
    </div>
    <div class="col-6 text-right">
        <a href="#" class="text-light"><small>Create new account</small></a>
    </div>
@endsection
