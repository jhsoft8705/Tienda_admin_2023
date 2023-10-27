@extends('layouts.app')

@section('content')
<section class="section">
    <ul class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item">
            <h4 class="page-title">Usuarios</h4>
        </li>
    </ul>
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center w-100">
                            <div class="col-sm-6">
                                <h4>Editar Usuario</h4>
                                <p class="m-0">{{ $user->email }}</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-light text-uppercase rounded-0">Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- f -->
                        <form method="POST" action="{{ route('users.update') }}" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" maxlength="20" class="form-control" value="{{ $user->nombre }}" required/>
                                    <div class="invalid-feedback">Por favor ingrese nombre</div>
                                    @if (\Session::has('nombre'))
                                    <div class="invalid-message-feedback">{!! \Session::get('nombre') !!}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Apellido</label>
                                    <input type="text" name="apellidos" maxlength="20" class="form-control" value="{{ $user->apellidos }}" required/>
                                    <div class="invalid-feedback">Por favor ingrese apellido</div>
                                    @if (\Session::has('nombre'))
                                    <div class="invalid-message-feedback">{!! \Session::get('nombre') !!}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Teléfono</label>
                                    <input type="number" name="celular" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" class="form-control" value="{{ $user->celular }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <input type="email" name="email" class="form-control" maxlength="50" value="{{ $user->email }}"/>
                                <div class="invalid-feedback">Por favor ingrese correo electrónico</div>
                                @if($errors->has('email'))
                                <div class="invalid-message-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tipo de Usuario</label>
                                <select name="tipo_usuario" class="form-control" required>
                                    <option value="1" {{ $user->tipo_usuario == 1 ? 'selected' : '' }}>Administrador</option>
                                    <option value="2" {{ $user->tipo_usuario == 2 ? 'selected' : '' }}>Vendedor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="1" {{ $user->estado == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ $user->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Clave</label>
                                <input type="password" minlength="6" name="clave" class="form-control" value="{{ $user->password }}" />
                            </div>
                            <div class="form-group pt-3">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ $user->user_id }}" readonly/>
                                <button type="submit" class="btn btn-primary text-uppercase">Guardar Cambios</button>
                            </div>
                        </form>
                        <!-- f -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection