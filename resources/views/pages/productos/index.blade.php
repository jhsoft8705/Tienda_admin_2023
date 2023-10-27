@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="fab-container">
            <div class="fab fab-icon-holder">
                <span class="material-icons">add</span>
            </div>
            <ul class="fab-options">
                <li>
                    <span class="fab-label">Nuevo Producto</span>
                    <a class="fab-icon-holder text-decoration-none" href="{{ route('productos.create') }}">
                        <span class="material-icons">inventory_2</span>
                    </a>
                </li>
                <li>
                    <span class="fab-label">Nueva Categoria</span>
                    <a class="fab-icon-holder text-decoration-none" href="{{ route('categorias_producto.create') }}">
                        <span class="material-icons">list</span>
                    </a>
                </li>
                <li>
                    <span class="fab-label">Ver Categorias</span>
                    <a class="fab-icon-holder text-decoration-none" data-target="#categoriasModal" data-toggle="modal"
                        href="#categoriasModal">
                        <span class="material-icons">list</span>
                    </a>
                </li>
                <li>
                    <span class="fab-label">Nueva Marca</span>
                    <a class="fab-icon-holder text-decoration-none" href="{{ route('marcas_producto.create') }}">
                        <span class="material-icons">bookmark</span>
                    </a>
                </li>
                <li>
                    <span class="fab-label">Ver Marcas</span>
                    <a class="fab-icon-holder text-decoration-none" data-target="#marcasModal" data-toggle="modal"
                        href="#marcasModal">
                        <span class="material-icons">bookmark</span>
                    </a>
                </li>

            </ul>
        </div>
        <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
                <h4 class="page-title">Productos</h4>
            </li>
        </ul>
        <div class="section-body mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col-sm-6">
                                    <h4>Listado de Productos</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Sub Categoria</th>
                                            <th>Marca</th>
                                            <th>Material</th>
                                            <th>Colores</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                            <tr>
                                                <td>{{ $producto->nombre }}</td>
                                                <td>{{ 'S/. ' . $producto->precio }}
                                                    @if ($producto->estado_oferta == 1)
                                                        <div class="ml-2 badge badge-warning">En Oferta</div>
                                                    @elseif($producto->estado_oferta == 0)
                                                        <div class="ml-2 badge badge-info">Precio Normal</div>
                                                    @elseif($producto->estado_oferta == 2)
                                                        <div class="ml-2 badge badge-danger">Precio Oferta por Tiempo</div>
                                                    @endif
                                                </td>
                                                <td>{{ $producto->subcategoria->nombre }}</td>
                                                <td>{{ $producto->marca->nombre }}</td>
                                                <td>{{ $producto->material }}</td>
                                                <td>
                                                    @foreach ($producto->colores as $color)
                                                        <a class="product-color"
                                                            data-target="{{ '#colorModal' . $color->color_producto_id }}"
                                                            data-toggle="modal"
                                                            href="{{ '#colorModal' . $color->color_producto_id }}">
                                                            <span class="material-icons"
                                                                style="color: {{ $color->codigo_color }}">
                                                                brightness_1
                                                            </span>
                                                        </a>
                                                    @endforeach

                                                    <a class="product-color"
                                                        href="{{ route('colores_producto.create', ['id' => $producto->producto_id]) }}">
                                                        <span class="material-icons">
                                                            add_circle_outline
                                                        </span>
                                                    </a>

                                                </td>
                                                <td class="text-center">
                                                    @if ($producto->estado == 1)
                                                        <div class="badge badge-success">Activo</div>
                                                    @elseif($producto->estado == 0)
                                                        <div class="badge badge-danger">Inactivo</div>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('productos.edit', ['id' => $producto->producto_id]) }}"
                                                        class="text-info" data-toggle="tooltip" title="Editar"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-3">
                                                            <path d="M12 20h9"></path>
                                                            <path
                                                                d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                            </path>
                                                        </svg></a>
                                                    <a data-target="#precioMayor{{ $producto->producto_id }}"
                                                        data-toggle="modal"
                                                        href="#precioMayor{{ $producto->producto_id }}"
                                                        class="text-warning" data-toggle="tooltip"
                                                        title="Precios por Mayor"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="currentColor"
                                                            class="bi bi-tag" viewBox="0 0 16 16">
                                                            <path
                                                                d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z" />
                                                            <path
                                                                d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z" />
                                                        </svg></a>
                                                    @if (auth()->user()->tipo_usuario == 1)
                                                        @if ($producto->detalles_venta->count() == 0)
                                                            <a href="javascript:eliminarProducto({{ $producto->producto_id }},true)"
                                                                class="text-danger" data-toggle="tooltip"
                                                                title="Eliminar"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" fill="currentColor"
                                                                    class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg></a>
                                                        @else
                                                            <a class="text-secondary" data-toggle="tooltip"
                                                                title="Eliminar"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" fill="currentColor"
                                                                    class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg></a>
                                                        @endif
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
        </div>
    </section>
    <div class="modal fade" id="categoriasModal" tabindex="-1" role="dialog" aria-labelledby="categoriasTitutlo"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoriasTitutlo">Categorias de Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col text-right mb-2">
                        <a href="{{ route('categorias_producto.create') }}" class="w-100 button-icon-s principal"><span
                                class="material-icons">
                                add_circle_outline
                            </span>Agregar</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped datatable_custom">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td class="text-center">
                                            <img class="img-table"
                                                src="{{ url('/categorias/' . ($categoria->imagen ? $categoria->imagen : $categoria->first()->imagen)) }}"
                                                title='' />
                                        </td>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td>{{ $categoria->tipo_nombre }}</td>
                                        <td class="text-center">
                                            @if ($categoria->estado == 1)
                                                <div class="badge badge-success">Activo</div>
                                            @elseif($categoria->estado == 0)
                                                <div class="badge badge-danger">Inactivo</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('categorias_producto.edit', ['id' => $categoria->categoria_producto_id]) }}"
                                                class="text-info" data-toggle="tooltip" title="Editar"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-3">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                    </path>
                                                </svg></a>
                                            @if ($categoria->categoria_producto_id != 1)
                                                <a data-dismiss="modal"
                                                    data-target="#subCategoriasModal{{ $categoria->categoria_producto_id }}"
                                                    data-toggle="modal"
                                                    href="#subCategoriasModal{{ $categoria->categoria_producto_id }}"
                                                    class="text-warning" data-toggle="tooltip" title="Sub Categorias"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path
                                                            d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                    </svg></a>
                                            @else
                                                <a class="text-secondary" data-toggle="tooltip" title="Sub Categorias"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path
                                                            d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                    </svg></a>
                                            @endif

                                            @if ($categoria->sub_categorias->count() == 0 && $categoria->categoria_producto_id != 1)
                                                <a href="javascript:eliminar({{ $categoria->categoria_producto_id }},true)"
                                                    class="text-danger" data-toggle="tooltip" title="Eliminar"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg></a>
                                            @else
                                                <a class="text-secondary" data-toggle="tooltip" title="Eliminar"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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


    <div class="modal fade" id="marcasModal" tabindex="-1" role="dialog" aria-labelledby="marcasTitutlo"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="marcasTitutlo">Marcas de Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col text-right mb-2">
                        <a href="{{ route('marcas_producto.create') }}" class="w-100 button-icon-s principal"><span
                                class="material-icons">
                                add_circle_outline
                            </span>Agregar</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped datatable_custom">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Productos</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marcas as $marca)
                                    <tr>
                                        <td>{{ $marca->nombre }}</td>
                                        <td>{{ $marca->productos->count() }} Productos</td>
                                        <td class="text-center">
                                            <a href="{{ route('marcas_producto.edit', ['id' => $marca->marca_producto_id]) }}"
                                                class="text-info" data-toggle="tooltip" title="Editar"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-3">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                    </path>
                                                </svg></a>
                                            @if ($marca->productos->count() == 0 && $marca->marca_producto_id != 1)
                                                <a href="javascript:eliminar({{ $marca->marca_producto_id }},false)"
                                                    class="text-danger" data-toggle="tooltip" title="Eliminar"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg></a>
                                            @else
                                                <a class="text-secondary" data-toggle="tooltip" title="Eliminar"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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


    @foreach ($categorias as $categoria)
        <div class="modal fade" id="subCategoriasModal{{ $categoria->categoria_producto_id }}" tabindex="-1"
            role="dialog" aria-labelledby="marcasTitutlo" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="marcasTitutlo">Sub Categorias de {{ $categoria->nombre }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="col text-right mb-2">
                            <a href="{{ route('sub_categorias_producto.create', ['id' => $categoria->categoria_producto_id]) }}"
                                class="w-100 button-icon-s principal"><span class="material-icons">
                                    add_circle_outline
                                </span>Agregar</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped datatable_custom">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Productos</th>
                                        <th class="center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoria->sub_categorias as $sub_categoria)
                                        <tr>
                                            <td>{{ $sub_categoria->nombre }}</td>
                                            <td>{{ $sub_categoria->productos->count() }} Productos</td>
                                            <td class="text-center">
                                                @if ($sub_categoria->estado == 1)
                                                    <div class="badge badge-success">Activo</div>
                                                @elseif($sub_categoria->estado == 0)
                                                    <div class="badge badge-danger">Inactivo</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('sub_categorias_producto.edit', ['id' => $sub_categoria->sub_categoria_producto_id]) }}"
                                                    class="text-info" data-toggle="tooltip" title="Editar"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-3">
                                                        <path d="M12 20h9"></path>
                                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                        </path>
                                                    </svg></a>
                                                @if ($sub_categoria->productos->count() == 0)
                                                    <a href="javascript:eliminarSubCategoria({{ $sub_categoria->sub_categoria_producto_id }},false)"
                                                        class="text-danger" data-toggle="tooltip" title="Eliminar"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg></a>
                                                @else
                                                    <a class="text-secondary" data-toggle="tooltip" title="Eliminar"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
    @foreach ($productos as $producto)
        <div class="modal fade" id="precioMayor{{ $producto->producto_id }}" tabindex="-1" role="dialog"
            aria-labelledby="mayorTitulo{{ $producto->producto_id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mayorTitulo{{ $producto->producto_id }}">Precio por Mayor:
                            {{ $producto->nombre }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="col text-right mb-2">
                            <a href="{{ route('precios_por_mayor.create', ['id' => $producto->producto_id]) }}"
                                class="w-100 button-icon-s principal"><span class="material-icons">
                                    add_circle_outline
                                </span>Nuevo Precio</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped datatable_custom">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($producto->precios_por_mayor as $precio)
                                        <tr>

                                            <td>{{ $precio->cantidad . ' Unidades' }}</td>
                                            <td>{{ 'S/. ' . $precio->precio }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('precios_por_mayor.edit', ['id' => $precio->precio_por_mayor_id]) }}"
                                                    class="text-info" data-toggle="tooltip" title="Editar"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-3">
                                                        <path d="M12 20h9"></path>
                                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                        </path>
                                                    </svg></a>
                                                <a href="javascript:eliminarPrecio({{ $precio->precio_por_mayor_id }},true)"
                                                    class="text-danger" data-toggle="tooltip" title="Eliminar"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg></a>

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
        @foreach ($producto->colores as $color)
            <div class="modal fade" id="{{ 'colorModal' . $color->color_producto_id }}" tabindex="-1" role="dialog"
                aria-labelledby="{{ 'colorTitulo' . $color->color_producto_id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="marcasTitutlo">Información Color de Producto //
                                {{ $producto->nombre }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-sm-6">
                                <div id="carouselExampleIndicators{{ $color->color_producto_id }}"
                                    class="carousel slide" data-interval="false" data-ride="carousel">
                                    <div class="carousel-inner p-4">
                                        @if ($color->imagenes->count() != 0)
                                            @foreach ($color->imagenes as $imagen)
                                                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">

                                                    <img class="preview"
                                                        src="{{ asset('colores_producto/' . $producto->producto_id . '/' . $imagen->imagen) }}" />

                                                </div>
                                            @endforeach
                                        @else
                                            <div class="carousel-item active">
                                                <div class="form-group mr-3">
                                                    <div><img class="preview"
                                                            src="{{ asset('assets/img/image-preview.jpg') }}" /></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <a class="carousel-control-prev"
                                        href="#carouselExampleIndicators{{ $color->color_producto_id }}" role="button"
                                        data-slide="prev">
                                        <span class="material-icons text-dark">
                                            arrow_back_ios
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next"
                                        href="#carouselExampleIndicators{{ $color->color_producto_id }}" role="button"
                                        data-slide="next">
                                        <span class="material-icons text-dark">
                                            arrow_forward_ios
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>


                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-2">
                                        <span class="material-icons font-50 mr-2"
                                            style="color: {{ $color->codigo_color }}">
                                            brightness_1
                                        </span>
                                    </div>
                                    <div class="col-sm-10">
                                        <h2 class="m-0">{{ $color->nombre }}</h2>
                                        @if ($color->estado_stock == 0)
                                            <p class="text-danger font-weight-bolder m-0">Stock Agotado</p>
                                        @else
                                            <p class="text-success font-weight-bolder m-0">En Stock</p>
                                        @endif
                                        <div class="form-group">
                                            <label>Tallas</label>
                                            <div class="d-flex">
                                                @foreach ($color->tallas as $talla)
                                                    <div
                                                        class="talla {{ $talla->estado_stock == 0 ? 'talla-stock' : '' }}">
                                                        <span class="font-20 font-weight-bold">
                                                            {{ $talla->talla }}
                                                        </span>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        @if ($color->estado_principal == 1)

                                            <p class="text-info font-weight-bolder m-0"><span
                                                    class="material-icons align-middle mr-1">
                                                    info
                                                </span> Se Muestra en la Pantalla Principal a los usuarios.</p>
                                        @endif
                                        <div class="mt-5 text-right mb-2">
                                            <a href="{{ route('colores_producto.edit', ['id' => $color->color_producto_id]) }}"
                                                class="w-100 button-icon-s principal"><span class="material-icons">
                                                    edit
                                                </span>Editar</a>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
            </div>
        @endforeach
    @endforeach
    <script>
        function eliminar(id, type) {
            var label = (type) ? "categoria" : "marca";
            Swal.fire({
                type: 'warning',
                title: '¿Esta seguro que desea eliminar esta ' + label + '?',
                text: "Una vez elimnado no podras recuperar los datos de est " + label,
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Elimnando " + label,
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
                        url: (type) ? "{{ route('categorias_producto.delete') }}" :
                            "{{ route('marcas_producto.delete') }}",
                        data: data,
                        success: function(result) {
                            swal.close();
                            if (result.error) {
                                Swal.fire({
                                    type: "error",
                                    title: "Ocurrio un error",
                                    text: "Lo sentimos pero no pudimos eliminar esta " + label +
                                        ", por favor intentelo mas tarde.",
                                    confirmButtonText: "Aceptar",
                                    confirmButtonColor: "#2c5099",
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    title: "Se ha eliminado tu " + label + " correctamente",
                                    text: "Tu " + label + " se ha eliminado correctamente!.",
                                    footer: `<a style="background-color: #2c5099;
                            border-left-color: #2c5099;
                            border-right-color: #2c5099;" 
                            class="swal2-confirm swal2-styled" href="{{ route('productos.index') }}">Continuar</a>`,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        }
                    });
                };
            });
        }

        function eliminarPrecio(id) {
            Swal.fire({
                type: 'warning',
                title: '¿Esta seguro que desea eliminar este precio por mayor?',
                text: "Una vez elimnado no podras recuperar los datos de este precio ",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Eliminando precio",
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
                        url: "{{ route('precios_por_mayor.delete') }}",
                        data: data,
                        success: function(result) {
                            swal.close();
                            if (result.error) {
                                Swal.fire({
                                    type: "error",
                                    title: "Ocurrio un error",
                                    text: "Lo sentimos pero no pudimos eliminar este precio por favor intentelo mas tarde.",
                                    confirmButtonText: "Aceptar",
                                    confirmButtonColor: "#2c5099",
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    title: "Se ha eliminado tu precio correctamente",
                                    text: "Tu Precio se ha eliminado correctamente!.",
                                    footer: `<a style="background-color: #2c5099;
                            border-left-color: #2c5099;
                            border-right-color: #2c5099;" 
                            class="swal2-confirm swal2-styled" href="{{ route('productos.index') }}">Continuar</a>`,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        }
                    });
                };
            });
        }

        function eliminarSubCategoria(id) {
            Swal.fire({
                type: 'warning',
                title: '¿Esta seguro que desea eliminar esta Subcategoria?',
                text: "Una vez elimnado no podras recuperar los datos de esta Sub Categoria ",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Eliminando Sub Categoria",
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
                        url: "{{ route('sub_categorias_producto.delete') }}",
                        data: data,
                        success: function(result) {
                            swal.close();
                            if (result.error) {
                                Swal.fire({
                                    type: "error",
                                    title: "Ocurrio un error",
                                    text: "Lo sentimos pero no pudimos eliminar esta subcategoria por favor intentelo mas tarde.",
                                    confirmButtonText: "Aceptar",
                                    confirmButtonColor: "#2c5099",
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    title: "Se ha eliminado tu subcategoria correctamente",
                                    text: "Tu subcategoria se ha eliminado correctamente!.",
                                    footer: `<a style="background-color: #2c5099;
                            border-left-color: #2c5099;
                            border-right-color: #2c5099;" 
                            class="swal2-confirm swal2-styled" href="{{ route('productos.index') }}">Continuar</a>`,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        }
                    });
                };
            });
        }

        function eliminarProducto(id) {
            Swal.fire({
                type: 'warning',
                title: '¿Esta seguro que desea eliminar este producto?',
                text: "Se eliminara tu producto junto con sus colores, imagenes, y precios por mayor.",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Eliminando producto",
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
                        url: "{{ route('productos.delete') }}",
                        data: data,
                        success: function(result) {
                            swal.close();
                            if (result.error) {
                                Swal.fire({
                                    type: "error",
                                    title: "Ocurrio un error",
                                    text: "Lo sentimos pero no pudimos eliminar este producto por favor intentelo mas tarde.",
                                    confirmButtonText: "Aceptar",
                                    confirmButtonColor: "#2c5099",
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    title: "Se ha eliminado tu producto correctamente",
                                    text: "Tu Producto se ha eliminado correctamente!.",
                                    footer: `<a style="background-color: #2c5099;
                            border-left-color: #2c5099;
                            border-right-color: #2c5099;" 
                            class="swal2-confirm swal2-styled" href="{{ route('productos.index') }}">Continuar</a>`,
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

    <script src="{{ asset('assets/js/image_preview.js') }}"></script>

@endsection
