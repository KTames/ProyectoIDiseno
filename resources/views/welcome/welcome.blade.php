<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Proyecto II Diseño</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/welcome.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="img-header mb-3">
            <img src="{{ asset('img/tree-main.jpg') }}" alt="Árbol">

            <div class="content d-flex flex-column justify-content-center align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                    <h1 class="text-white display-4">Iniciar Sesión</h1>
                </div>
                <div class="d-flex align-items-center">
                     <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-white">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-white">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-3 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Remember Me') }}
                                    </label> 
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                 @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white" href="{{ route('password.request') }} ">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button> 
                            </div>
                        </div>
                    </form>   
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button class="btn btn-primary shadow btn-green-moon mt-4 " class="editButton" type="submit"
                            onclick="showRegistroModal()">Registrarse
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('movimientos.index') }}" class="btn btn-primary mt-4 shadow btn-green-moon">Administrar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-0 my-5">
            <div class="col-md-6 col-sm-12">
                @include('welcome.__text-item', [
                    'title' => 'Maneja tu jerarquía',
                    'text' => 'GroupTree te permite agregar, editar, y eliminar niveles de tu estructura jerárquica.',
                    'svgImage' => 'software_engineer'
                ])
            </div>
            <div class="col-md-6 col-sm-12">
                @include('welcome.__text-item', [
                    'title' => 'Administra miembros',
                    'text' => 'Con GroupTree puedes manejar información personal de los miembros de tu grupo, y asignarlos a distintos roles en tu movimiento.',
                    'svgImage' => 'team_management'
                ])
            </div>
        </div>
    </body>
    @include('partials.registro')
</html>