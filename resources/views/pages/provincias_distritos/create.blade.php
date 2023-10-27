@extends('layouts.app')

@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
                <h4 class="page-title">Provincias y Distritos</h4>
            </li>
        </ul>
        <div class="section-body mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col-sm-6">
                                    <h4>Agregar Provincia o Distrito</h4>
                                </div>
                                <div class="col-sm-6 text-right justify-content-end d-flex">
                                    <a href="{{ route('ventas.index') }}"
                                        class="btn btn-light text-uppercase rounded-0">Volver</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- f -->

                            <form method="POST" action="{{ route('provincia_distrito.store') }}" class="needs-validation"
                                novalidate enctype="multipart/form-data">


                                <div class="row no-gutters align-items-center">
                                    <div class="col-sm-12">
                                        <div class="form-group mr-3">
                                            <label>Nombre</label>
                                            <input type="text" name="nombre" class="form-control" maxlength="99" required>
                                            <div class="invalid-feedback">Por favor ingrese un nombre valido</div>
                                            <label>Estado</label>
                                            <select name="estado" class="form-control" required>
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group pt-2">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="departamento_id"
                                        value="{{ $departamento->departamento_id }}" readonly />
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
@section('scripts')
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/js/image_preview.js') }}"></script>
@endsection
