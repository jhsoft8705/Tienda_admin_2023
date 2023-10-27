@extends('layouts.auth')

@section('content')
    <div class="fondo-login">
        <section class="section-login bg-login row d-flex align-items-center m-0">
            <div class="col-sm-5 h-100 px-5" style="background-color: #fff">
                <img class="my-3" style="width: 54%" alt="Usuario" src="{{ asset('assets/img/logo.png') }}"><br>
                <h2 class="font-42 my-4" style="font-weight: 700; letter-spacing:2px; color: #4166ac">
                    Hola, Bienvenido al Sistema
                </h2>
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                    <div class="wrap-input100 bg1">
                        <span class="label-input100">Correo Electrónico</span>
                        <input id="email" type="email" name="email" maxlength="50" class="input100"
                            placeholder="Ingresa tu correo electrónico aqui" value="{{ old('email') }}" tabindex="1"
                            required autofocus>
                        <div class="invalid-feedback">Por favor complete su correo electrónico</div>
                        @if ($errors->has('email'))
                            <div class="invalid-message-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="wrap-input100 bg1">
                        <span class="label-input100">Contraseña</span>
                        <input id="password" type="password" name="password" maxlength="30" tabindex="2" minlength="6"
                            required class="input100" placeholder="Ingresa tu contraseña aqui">
                        <div class="invalid-feedback">Por favor ingrese su contraseña</div>
                        @if ($errors->has('password'))
                            <div class="invalid-message-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <input type="hidden" name="device_token" id="device_token">
                    <div class="form-group pt-3">

                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary btn-lg btn-block font-17 py-3" style="font-weight: 800;     display: flex;
                    font-weight: 800;
                    justify-content: center;
                    background-color:#004786 !important" tabindex="4"><span class="material-icons mr-2">
                                login
                            </span> INGRESAR</button>
                    </div>
                </form>
            </div>

        </section>
    </div>
@endsection
