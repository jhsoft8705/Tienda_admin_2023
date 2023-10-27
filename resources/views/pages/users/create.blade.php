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
                                <h4>Agregar Usuario</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-light text-uppercase rounded-0">Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- f -->
                        <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" maxlength="20" class="form-control" required>
                                    <div class="invalid-feedback">Por favor ingrese nombre</div>
                                    @if (\Session::has('nombre'))
                                    <div class="invalid-message-feedback">{!! \Session::get('nombre') !!}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Apellido</label>
                                    <input type="text" name="apellidos" maxlength="20" class="form-control" required>
                                    <div class="invalid-feedback">Por favor ingrese apellido</div>
                                    @if (\Session::has('nombre'))
                                    <div class="invalid-message-feedback">{!! \Session::get('nombre') !!}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Teléfono</label>
                                    <input type="number" name="celular" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" class="form-control">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label>Correo electrónico</label>
                                <input type="email" name="email" maxlength="50" class="form-control" value="{{ old('email') }}" required>
                                <div class="invalid-feedback">Por favor ingrese correo electrónico</div>
                                @if($errors->has('email'))
                                <div class="invalid-message-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tipo de Usuario</label>
                                <select name="tipo_usuario" class="form-control" required>
                                    <option value="1">Administrador</option>
                                    <option value="2">Vendedor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group pt-3">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary text-uppercase">Guardar</button>
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