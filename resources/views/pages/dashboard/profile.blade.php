@extends('layouts.app')

@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
                <h4 class="page-title">Mi Perfil</h4>
            </li>
        </ul>
        <div class="section-body">
            <div class="row mt-3">
                <div class="col-12 col-md-12 col-lg-4">
                    @include('blocks.personal-information')
                </div>
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <!-- f -->
                        <form method="POST" action="{{ route('dashboard.update-profile') }}" class="needs-validation"
                            novalidate>
                            <div class="card-header">
                                <h4>Editar Perfil</h4>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close"
                                                data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ session()->get('success') }}</strong>
                                        </div>
                                    </div>
                                @elseif(session()->has('failed'))
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close"
                                                data-dismiss="alert"><span>&times;</span></button>
                                            <strong>{{ session()->get('failed') }}</strong>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" maxlength="20" class="form-control"
                                            value="{{ $user->nombre }}" required>
                                        <div class="invalid-feedback">Por favor ingrese el nombre</div>
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>Apellido</label>
                                        <input type="text" name="apellidos" maxlength="20" class="form-control"
                                            value="{{ $user->apellidos }}" required>
                                        <div class="invalid-feedback">Por favor ingrese el apellido</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Correo electrónico</label>
                                        <input type="text" name="email" maxlength="50" class="form-control"
                                            value="{{ $user->email }}">
                                        @if (\Session::has('email'))
                                            <div class="invalid-message-feedback">{!! \Session::get('email') !!}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>Celular</label>
                                        <input type="number" pattern="/^-?\d+\.?\d*$/"
                                            onKeyPress="if(this.value.length==9) return false;" name="celular"
                                            class="form-control" value="{{ $user->celular }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer pt-0">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                        <!-- f -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
