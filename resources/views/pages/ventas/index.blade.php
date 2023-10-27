@extends('layouts.app')

@section('content')
    <div class="fab-container">
        <div class="fab fab-icon-holder">
            <span class="material-icons">add</span>
        </div>
        <ul class="fab-options">
            <li>
                <span class="fab-label">Ver Departamentos</span>
                <a class="fab-icon-holder text-decoration-none" data-target="#departamentosModal" data-toggle="modal"
                    href="#metodosModal">
                    <span class="material-icons">map</span>
                </a>
            </li>
            <li>
                <span class="fab-label">Metodos de Pago</span>
                <a class="fab-icon-holder text-decoration-none" data-target="#metodosModal" data-toggle="modal"
                    href="#metodosModal">
                    <span class="material-icons">credit_card</span>
                </a>
            </li>
        </ul>
    </div>
    <ul class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item">
            <h4 class="page-title">Ventas</h4>
        </li>
    </ul>
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center w-100">
                            <div class="col-sm-12">
                                <h4>Listado de Ventas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tabla-ventas">

                            @include('blocks.lista-ventas')

                            <div class="modal fade" id="metodosModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="categoriasTitutlo">Metodos de Pago</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col text-right mb-3">
                                                <a href="{{ route('metodos_de_pago.create') }}"
                                                    class="w-100 button-icon-s principal"><span class="material-icons">
                                                        add_circle_outline
                                                    </span>Agregar</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped datatable_custom">
                                                    <thead>
                                                        <tr>
                                                            <th>Imagen</th>
                                                            <th>Nombre</th>
                                                            <th>Nro de Abono</th>
                                                            <th class="text-center">Estado</th>
                                                            <th class="text-center">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($metodos as $metodo)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <img class="img-table"
                                                                        src="{{ $metodo->imagen ? url('/metodos_de_pago/' . $metodo->imagen) : asset('assets/img/logo_gray.png') }}"
                                                                        title='' />
                                                                </td>
                                                                <td>
                                                                    {{ $metodo->nombre }}
                                                                </td>
                                                                <td>
                                                                    {{ $metodo->nro_abono }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($metodo->estado == 1)
                                                                        <div class="badge badge-success">Activo</div>
                                                                    @elseif($metodo->estado == 0)
                                                                        <div class="badge badge-danger">Inactivo</div>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    <a href="{{ route('metodos_de_pago.edit', ['id' => $metodo->metodo_de_pago_id]) }}"
                                                                        class="text-info" data-toggle="tooltip"
                                                                        title="Editar"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-edit-3">
                                                                            <path d="M12 20h9"></path>
                                                                            <path
                                                                                d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                                            </path>
                                                                        </svg></a>
                                                                    @if ($metodo->ventas->count() == 0)
                                                                        <a href="javascript:eliminar({{ $metodo->metodo_de_pago_id }})"
                                                                            class="text-danger" data-toggle="tooltip"
                                                                            title="Eliminar"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" fill="currentColor"
                                                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                                <path fill-rule="evenodd"
                                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                            </svg></a>
                                                                    @else
                                                                        <a class="text-secondary" data-toggle="tooltip"
                                                                            title="Eliminar"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" fill="currentColor"
                                                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                                <path fill-rule="evenodd"
                                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                            </svg></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="departamentosModal" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Departamentos</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col text-right mb-3">
                                                <a href="{{ route('departamentos.create') }}"
                                                    class="w-100 button-icon-s principal"><span class="material-icons">
                                                        add_circle_outline
                                                    </span>Agregar</a>
                                                <div class="w-100 text-center d-flex mt-3 justify-content-center">
                                                    <h3><span class="badge badge-success">Costo Principal:
                                                            S/.{{ $informacion->costo_envio_principal }}</span>
                                                        |
                                                        <span class="badge badge-info">Costo Secundario:
                                                            S/.{{ $informacion->costo_envio_secundario }}</span>

                                                    </h3>
                                                    <a class="text-warning" href="#preciosModal" data-toggle="modal"
                                                        data-target="#preciosModal">
                                                        <span class="material-icons font-40">
                                                            edit
                                                        </span>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped datatable_custom">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th class="text-center">Estado</th>
                                                            <th class="text-center">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($departamentos as $departamento)
                                                            <tr>
                                                                <td class="align-items-center d-flex">
                                                                    {{ $departamento->nombre }}
                                                                    @if ($departamento->estado_principal == 1)
                                                                        <span data-toggle="tooltip" title="Precio Principal"
                                                                            class="material-icons text-info ml-2">
                                                                            verified
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($departamento->estado == 1)
                                                                        <div class="badge badge-success">Activo</div>
                                                                    @elseif($departamento->estado == 0)
                                                                        <div class="badge badge-danger">Inactivo</div>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    <a href="#departamento{{ $departamento->departamento_id }}Modal"
                                                                        data-target="#departamento{{ $departamento->departamento_id }}Modal"
                                                                        data-toggle="modal" class="text-warning">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" fill="currentColor"
                                                                            class="bi bi-card-list" viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                                            <path
                                                                                d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                                        </svg>
                                                                    </a>
                                                                    <a href="{{ route('departamentos.edit', ['id' => $departamento->departamento_id]) }}"
                                                                        class="text-info" data-toggle="tooltip"
                                                                        title="Editar"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-edit-3">
                                                                            <path d="M12 20h9"></path>
                                                                            <path
                                                                                d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                                            </path>
                                                                        </svg></a>
                                                                    @if ($departamento->provincias->count() == 0)
                                                                        <a href="javascript:eliminarDepartamento({{ $departamento->departamento_id }})"
                                                                            class="text-danger" data-toggle="tooltip"
                                                                            title="Eliminar"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" fill="currentColor"
                                                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                                <path fill-rule="evenodd"
                                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                            </svg></a>
                                                                    @else
                                                                        <a class="text-secondary" data-toggle="tooltip"
                                                                            title="Eliminar"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" fill="currentColor"
                                                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                                <path fill-rule="evenodd"
                                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                            </svg></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @foreach ($departamentos as $departamento)
                                <div class="modal fade" id="departamento{{ $departamento->departamento_id }}Modal"
                                    tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="categoriasTitutlo">Provincias y Distritos de
                                                    {{ $departamento->nombre }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body row">
                                                <div class="col text-right mb-3">
                                                    <a href="{{ route('provincia_distrito.create', ['id' => $departamento->departamento_id]) }}"
                                                        class="w-100 button-icon-s principal"><span class="material-icons">
                                                            add_circle_outline
                                                        </span>Agregar</a>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped datatable_custom">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th class="text-center">Estado</th>
                                                                <th class="text-center">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($departamento->provincias as $provincia)
                                                                <tr>
                                                                    <td>
                                                                        {{ $provincia->nombre }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        @if ($provincia->estado == 1)
                                                                            <div class="badge badge-success">Activo</div>
                                                                        @elseif($provincia->estado == 0)
                                                                            <div class="badge badge-danger">Inactivo</div>
                                                                        @endif
                                                                    </td>

                                                                    <td class="text-center">
                                                                        <a href="{{ route('provincia_distrito.edit', ['id' => $provincia->provincia_distrito_id]) }}"
                                                                            class="text-info" data-toggle="tooltip"
                                                                            title="Editar"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                                fill="none" stroke="currentColor"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit-3">
                                                                                <path d="M12 20h9"></path>
                                                                                <path
                                                                                    d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                                                </path>
                                                                            </svg></a>
                                                                        @if ($provincia->ventas->count() == 0)
                                                                            <a href="javascript:eliminarProvincia({{ $provincia->provincia_distrito_id }})"
                                                                                class="text-danger"
                                                                                data-toggle="tooltip" title="Eliminar"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-trash"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                                </svg></a>
                                                                        @else
                                                                            <a class="text-secondary" data-toggle="tooltip"
                                                                                title="Eliminar"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-trash"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                                </svg></a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="modal fade" id="preciosModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Costos de Envio</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="row no-gutters align-items-center mx-5 w-100">
                                                <div class="col-sm-6">
                                                    <div class="form-group mr-3">
                                                        <label>Precio Principal (S/.):</label>
                                                        <input type="number"
                                                            value="{{ $informacion->costo_envio_principal }}"
                                                            id="precio_inicial" class="form-control" maxlength="99"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mr-3">
                                                        <label>Precio Secundario (S/.):</label>
                                                        <input type="number"
                                                            value="{{ $informacion->costo_envio_secundario }}"
                                                            id="precio_secundario" class="form-control" maxlength="99"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col text-right mt-3">
                                                    <a href="javascript:modificarPrecio()"
                                                        class="w-100 button-icon-s principal"><span
                                                            class="material-icons">
                                                            save
                                                        </span>Guardar</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function eliminar(id) {
                                Swal.fire({
                                    type: 'warning',
                                    title: '¿Esta seguro que desea eliminar este Metodo de Pago?',
                                    text: "Una vez elimnado no podras recuperar los datos de este Metodo de Pago",
                                    showCancelButton: true,
                                    confirmButtonText: 'Eliminar',
                                    cancelButtonText: 'Cancelar',
                                }).then((result) => {
                                    if (result.value) {
                                        Swal.fire({
                                            title: "Eliminando Metodo de Pago",
                                            allowOutsideClick: false
                                        });
                                        Swal.showLoading();
                                        var token = '{{ csrf_token() }}';
                                        var data = {
                                            id: id,
                                            _token: token
                                        };
                                        $.ajax({
                                            type: "post",
                                            url: "{{ route('metodos_de_pago.delete') }}",
                                            data: data,
                                            success: function(result) {
                                                swal.close();
                                                if (result.error) {
                                                    Swal.fire({
                                                        type: "error",
                                                        title: "Ocurrio un error",
                                                        text: "Lo sentimos pero no pudimos eliminar este Metodo de Pago por favor intentelo mas tarde.",
                                                        confirmButtonText: "Aceptar",
                                                        confirmButtonColor: "#2c5099",
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        type: 'success',
                                                        title: "Se ha eliminado tu Metodo de Pago correctamente",
                                                        text: "Tu Metodo de Pago se ha eliminado correctamente!.",
                                                        footer: `<a style="background-color: #2c5099;
                                                        border-left-color: #2c5099;
                                                        border-right-color: #2c5099;" 
                                                        class="swal2-confirm swal2-styled" href="{{ route('ventas.index') }}">Continuar</a>`,
                                                        showConfirmButton: false,
                                                        allowOutsideClick: false
                                                    });
                                                }
                                            }
                                        });
                                    };
                                });
                            }

                            function eliminarDepartamento(id) {
                                Swal.fire({
                                    type: 'warning',
                                    title: '¿Esta seguro que desea eliminar este Departamento?',
                                    text: "Una vez elimnado no podras recuperar los datos de este Departamento",
                                    showCancelButton: true,
                                    confirmButtonText: 'Eliminar',
                                    cancelButtonText: 'Cancelar',
                                }).then((result) => {
                                    if (result.value) {
                                        Swal.fire({
                                            title: "Eliminando Departamento",
                                            allowOutsideClick: false
                                        });
                                        Swal.showLoading();
                                        var token = '{{ csrf_token() }}';
                                        var data = {
                                            id: id,
                                            _token: token
                                        };
                                        $.ajax({
                                            type: "post",
                                            url: "{{ route('departamentos.delete') }}",
                                            data: data,
                                            success: function(result) {
                                                swal.close();
                                                if (result.error) {
                                                    Swal.fire({
                                                        type: "error",
                                                        title: "Ocurrio un error",
                                                        text: "Lo sentimos pero no pudimos eliminar este Departamento por favor intentelo mas tarde.",
                                                        confirmButtonText: "Aceptar",
                                                        confirmButtonColor: "#2c5099",
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        type: 'success',
                                                        title: "Se ha eliminado tu Departamento correctamente",
                                                        text: "Tu Departamento se ha eliminado correctamente!.",
                                                        footer: `<a style="background-color: #2c5099;
                                                        border-left-color: #2c5099;
                                                        border-right-color: #2c5099;" 
                                                        class="swal2-confirm swal2-styled" href="{{ route('ventas.index') }}">Continuar</a>`,
                                                        showConfirmButton: false,
                                                        allowOutsideClick: false
                                                    });
                                                }
                                            }
                                        });
                                    };
                                });
                            }

                            function eliminarProvincia(id) {
                                Swal.fire({
                                    type: 'warning',
                                    title: '¿Esta seguro que desea eliminar esta Provincia o Distrito?',
                                    text: "Una vez elimnado no podras recuperar los datos de esta Provincia o Distrito",
                                    showCancelButton: true,
                                    confirmButtonText: 'Eliminar',
                                    cancelButtonText: 'Cancelar',
                                }).then((result) => {
                                    if (result.value) {
                                        Swal.fire({
                                            title: "Eliminando Provincia o Distrito",
                                            allowOutsideClick: false
                                        });
                                        Swal.showLoading();
                                        var token = '{{ csrf_token() }}';
                                        var data = {
                                            id: id,
                                            _token: token
                                        };
                                        $.ajax({
                                            type: "post",
                                            url: "{{ route('provincia_distrito.delete') }}",
                                            data: data,
                                            success: function(result) {
                                                swal.close();
                                                if (result.error) {
                                                    Swal.fire({
                                                        type: "error",
                                                        title: "Ocurrio un error",
                                                        text: "Lo sentimos pero no pudimos eliminar esta Provincia o Distrito por favor intentelo mas tarde.",
                                                        confirmButtonText: "Aceptar",
                                                        confirmButtonColor: "#2c5099",
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        type: 'success',
                                                        title: "Se ha eliminado tu Provincia o Distrito correctamente",
                                                        text: "Tu Provincia o Distrito se ha eliminado correctamente!.",
                                                        footer: `<a style="background-color: #2c5099;
                                                        border-left-color: #2c5099;
                                                        border-right-color: #2c5099;" 
                                                        class="swal2-confirm swal2-styled" href="{{ route('ventas.index') }}">Continuar</a>`,
                                                        showConfirmButton: false,
                                                        allowOutsideClick: false
                                                    });
                                                }
                                            }
                                        });
                                    };
                                });
                            }

                            function LiquidarVenta(id) {
                                Swal.fire({
                                    type: 'warning',
                                    title: '¿Esta seguro que desea liquidar esta venta?',
                                    text: "Una vez liquidada no podra revertir los cambios ",
                                    showCancelButton: true,
                                    confirmButtonText: 'Liquidar',
                                    cancelButtonText: 'Cancelar',
                                }).then((result) => {
                                    if (result.value) {
                                        Swal.fire({
                                            title: "Liquidando Venta",
                                            allowOutsideClick: false
                                        });
                                        Swal.showLoading();
                                        var token = '{{ csrf_token() }}';
                                        var data = {
                                            id: id,
                                            _token: token
                                        };
                                        $.ajax({
                                            type: "post",
                                            url: "{{ route('ventas.liquidar') }}",
                                            data: data,
                                            success: function(result) {
                                                swal.close();
                                                if (result.error) {
                                                    Swal.fire({
                                                        type: "error",
                                                        title: "Ocurrio un error",
                                                        text: "Lo sentimos pero no pudimos liquidar esta venta por favor intentelo mas tarde.",
                                                        confirmButtonText: "Aceptar",
                                                        confirmButtonColor: "#2c5099",
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        type: 'success',
                                                        title: "Se ha liquidado tu venta Correctamente",
                                                        text: "Tu Venta se ha liquidado correctamente!.",
                                                        footer: `<a style="background-color: #2c5099;
                                                        border-left-color: #2c5099;
                                                        border-right-color: #2c5099;" 
                                                        class="swal2-confirm swal2-styled" href="{{ route('ventas.index') }}">Continuar</a>`,
                                                        showConfirmButton: false,
                                                        allowOutsideClick: false
                                                    });
                                                }
                                            }
                                        });
                                    };
                                });
                            }

                            function modificarPrecio() {
                                if ($('#precio_inicial').val() == '' || $('#precio_secundario').val() == '') {
                                    Swal.fire({
                                        type: "warning",
                                        title: "Complete los campos",
                                        text: "Por favor complete todos los campos para poder guardar sus datos.",
                                        confirmButtonText: "Aceptar",
                                        confirmButtonColor: "#2c5099",
                                    });
                                } else {
                                    Swal.fire({
                                        type: 'warning',
                                        title: '¿Esta seguro que desea actualizar los costos de envio?',
                                        text: "Una vez actualizado se modificaran sus datos anteriores",
                                        showCancelButton: true,
                                        confirmButtonText: 'Guardar',
                                        cancelButtonText: 'Cancelar',
                                    }).then((result) => {
                                        if (result.value) {
                                            Swal.fire({
                                                title: "Actualizando costos",
                                                allowOutsideClick: false
                                            });
                                            Swal.showLoading();
                                            var token = '{{ csrf_token() }}';
                                            var data = {
                                                precio_principal: $('#precio_inicial').val(),
                                                precio_secundario: $('#precio_secundario').val(),
                                                _token: token
                                            };
                                            $.ajax({
                                                type: "post",
                                                url: "{{ route('ventas.modificar_precios') }}",
                                                data: data,
                                                success: function(result) {
                                                    swal.close();
                                                    if (result.error) {
                                                        Swal.fire({
                                                            type: "error",
                                                            title: "Ocurrio un error",
                                                            text: "Lo sentimos pero no pudimos actualizar tus datos por favor intentelo mas tarde.",
                                                            confirmButtonText: "Aceptar",
                                                            confirmButtonColor: "#2c5099",
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            type: 'success',
                                                            title: "Se ha actualizado los costos correctamente",
                                                            text: "Tus costos se han actualizado correctamente!.",
                                                            footer: `<a style="background-color: #2c5099;
                                                        border-left-color: #2c5099;
                                                        border-right-color: #2c5099;" 
                                                        class="swal2-confirm swal2-styled" href="{{ route('ventas.index') }}">Continuar</a>`,
                                                            showConfirmButton: false,
                                                            allowOutsideClick: false
                                                        });
                                                    }
                                                }
                                            });
                                        };
                                    });
                                }

                            }

                            function refreshTable() {
                                $('div.tabla-ventas').fadeOut();
                                // $('#modals').fadeOut();
                                $('div.tabla-ventas').load("{{ route('ventas.listar_ventas') }}", function() {
                                    $('div.tabla-ventas').fadeIn();
                                    // $('#modals').fadeIn();
                                });

                            }

                            function cancelarVenta(id) {
                                Swal.fire({
                                    type: 'warning',
                                    title: '¿Esta seguro que desea cancelar esta venta?',
                                    text: "Una vez cancelada no podra revertir los cambios ",
                                    showCancelButton: true,
                                    confirmButtonText: 'Aceptar',
                                    cancelButtonText: 'Cancelar',
                                }).then((result) => {
                                    if (result.value) {
                                        Swal.fire({
                                            title: "Cancelando Venta",
                                            allowOutsideClick: false
                                        });
                                        Swal.showLoading();
                                        var token = '{{ csrf_token() }}';
                                        var data = {
                                            id: id,
                                            observacion: $('#observacion_' + id).val(),
                                            _token: token
                                        };
                                        $.ajax({
                                            type: "post",
                                            url: "{{ route('ventas.cancelar') }}",
                                            data: data,
                                            success: function(result) {
                                                swal.close();
                                                if (result.error) {
                                                    Swal.fire({
                                                        type: "error",
                                                        title: "Ocurrio un error",
                                                        text: "Lo sentimos pero no pudimos cancelar esta venta por favor intentelo mas tarde.",
                                                        confirmButtonText: "Aceptar",
                                                        confirmButtonColor: "#2c5099",
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        type: 'success',
                                                        title: "Se ha cancelado tu venta Correctamente",
                                                        text: "Tu Venta se ha cancelado correctamente!.",
                                                        footer: `<a style="background-color: #2c5099;
                                                        border-left-color: #2c5099;
                                                        border-right-color: #2c5099;" 
                                                        class="swal2-confirm swal2-styled" href="{{ route('ventas.index') }}">Continuar</a>`,
                                                        showConfirmButton: false,
                                                        allowOutsideClick: false
                                                    });
                                                }
                                            }
                                        });
                                    };
                                });
                            }
                        </script>
                    @endsection
