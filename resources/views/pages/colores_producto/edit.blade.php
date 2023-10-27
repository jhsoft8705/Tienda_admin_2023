@extends('layouts.app')

@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
                <h4 class="page-title">Colores de Producto</h4>
            </li>
        </ul>
        <div class="section-body row mt-3">

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center w-100">
                            <div class="col-sm-6">
                                <h4>Editar Color {{ $color->nombre }} a {{ $color->producto->nombre }}</h4>
                            </div>
                            <div class="col-sm-6 text-right justify-content-end d-flex">
                                <a href="{{ route('productos.index') }}"
                                    class="btn btn-light text-uppercase rounded-0">Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- f -->
                        <div class="row no-gutters align-items-center">
                            <div class="col-sm-4">
                                <div class="form-group mr-3">
                                    <label>Nombre</label>
                                    <input type="text" id="nombre" value="{{ $color->nombre }}" name="nombre"
                                        class="form-control" maxlength="99" required>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mr-3">
                                    <label>Pantalla de Inicio</label>
                                    <select id="estado_principal" name="estado_principal" class="form-control" required>
                                        <option value="0" {{ $color->estado_principal == 0 ? 'selected' : '' }}>No Mostrar
                                        </option>
                                        <option value="1" {{ $color->estado_principal == 1 ? 'selected' : '' }}>Mostrar
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mr-3">
                                    <label>Estado</label>
                                    <select id="estado_stock" name="estado_stock" class="form-control" required>
                                        <option value="1" {{ $color->estado_stock == 1 ? 'selected' : '' }}>En Stock
                                        </option>
                                        <option value="0" {{ $color->estado_stock == 0 ? 'selected' : '' }}>Sin Stock
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" id="codigo_color" value="{{ $color->codigo_color }}"
                                        name="codigo_color" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row no-gutters align-items-center">
                            <div class="form-group">
                                <label>Tallas</label>
                                <div class="d-flex">

                                    <div id="tallas_container" class="d-flex">
                                        @foreach ($color->tallas as $talla)
                                            <div id="talla_contenedor_registrado_{{ $talla->talla_producto_id }}"
                                                class="dropdown show">
                                                <a class="talla" href="#" role="button"
                                                    id="dropdownMenuLink{{ $talla->talla_producto_id }}"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span id="labelTallaRegistrada{{ $loop->index }}"
                                                        style="align-items: center;">{{ $talla->talla }}</span>
                                                </a>
                                                <div class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuLink{{ $talla->talla_producto_id }}">
                                                    <a id="editarRegistrada{{ $talla->talla_producto_id }}"
                                                        class="dropdown-item"
                                                        href="javascript:abrirModalEditarTallaRegistrada({{ $loop->index }})">Editar</a>
                                                    <a id="eliminarRegistrada{{ $talla->talla_producto_id }}"
                                                        class="dropdown-item"
                                                        href="javascript:eliminarTallasEditar({{ $talla->talla_producto_id }})">Eliminar</a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <a class="talla" data-target="#agregarTallaModal" data-toggle="modal"
                                        href="#agregarTallaModal"><span class="material-icons font-20 font-weight-bold">
                                            add
                                        </span></a>
                                </div>
                            </div>
                        </div>


                        <div class="form-group pt-2">
                            {{ csrf_field() }}
                            <input type="hidden" name="color_producto_id" value="{{ $color->color_producto_id }}"
                                readonly />
                            <a href="javascript:guardarColor()" class="btn btn-primary text-uppercase">Guardar</a>
                        </div>
                        <!-- f -->
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header d-block">
                        <h4>Imagenes (*Opcional):</h4>
                        <p class="mb-0">Tamaño recomendado: 772x960px</p>
                    </div>
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-interval="false"
                            data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="form-group mr-3">
                                        <label>Imagen 1(Principal)</label>
                                        <div id='img_container_1'>
                                            <img class="preview" id="preview1"
                                                src="{{ $imagen1 == null? asset('assets/img/image-preview.jpg'): asset('colores_producto/' . $color->producto->producto_id . '/' . $imagen1->imagen) }}" />
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file files form-group">
                                                <input class="py-4" type="file" id="inputGroupFile01" name="image"
                                                    aria-describedby="inputGroupFileAddon01">
                                                <input type="hidden" id="imagen_1_id"
                                                    value="{{ $imagen1 != null ? $imagen1->imagen_producto_id : '0' }}"
                                                    readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="form-group mr-3">
                                        <label>Imagen 2</label>
                                        <div id='img_container_2'><img class="preview" id="preview2"
                                                src="{{ $imagen2 == null? asset('assets/img/image-preview.jpg'): asset('colores_producto/' . $color->producto->producto_id . '/' . $imagen2->imagen) }}" />
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file files form-group">
                                                <input class="py-4" type="file" id="inputGroupFile02"
                                                    name="image2" aria-describedby="inputGroupFileAddon02">
                                                <input type="hidden" id="imagen_2_id"
                                                    value="{{ $imagen2 != null ? $imagen2->imagen_producto_id : '0' }}"
                                                    readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="form-group">
                                        <label>Imagen 3</label>
                                        <div id='img_container_3'><img class="preview" id="preview3"
                                                src="{{ $imagen3 == null? asset('assets/img/image-preview.jpg'): asset('colores_producto/' . $color->producto->producto_id . '/' . $imagen3->imagen) }}" />
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file files form-group">
                                                <input class="py-4" type="file" id="inputGroupFile03"
                                                    name="image3" aria-describedby="inputGroupFileAddon03">
                                                <input type="hidden" id="imagen_3_id"
                                                    value="{{ $imagen3 != null ? $imagen3->imagen_producto_id : '0' }}"
                                                    readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="material-icons text-dark">
                                    arrow_back_ios
                                </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="material-icons text-dark">
                                    arrow_forward_ios
                                </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="modal fade" id="agregarTallaModal" tabindex="-1" role="dialog" aria-labelledby="agregarTallaTitulo"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarTallaTitulo">Agregar Talla</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-8">
                            <div class="form-group mr-3">
                                <label>Nombre</label>
                                <input type="text" id="talla_nombre" name="talla_nombre" class="form-control"
                                    maxlength="99" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Estado Stock</label>
                                <select id="talla_stock" name="talla_stock" class="form-control" required>
                                    <option value="1">En Stock</option>
                                    <option value="0">Sin Stock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <a class="btn btn-primary text-uppercase" href="javascript:agregarTalla()">Agregar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="editarTallaModal" tabindex="-1" role="dialog" aria-labelledby="agregarTallaTitulo"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarTallaTitulo">Editar Talla</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-8">
                            <div class="form-group mr-3">
                                <label>Nombre</label>
                                <input type="text" id="editar_talla_nombre" name="editar_talla_nombre"
                                    class="form-control" maxlength="99" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Estado Stock</label>
                                <select id="editar_talla_stock" name="editar_talla_stock" class="form-control" required>
                                    <option value="1">En Stock</option>
                                    <option value="0">Sin Stock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <a class="btn btn-primary text-uppercase" href="javascript:editarTalla()">Editar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="editarTallaRegistradaModal" tabindex="-1" role="dialog"
        aria-labelledby="agregarTallaTitulo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarTallaTitulo">Editar Talla</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-8">
                            <div class="form-group mr-3">
                                <label>Nombre</label>
                                <input type="text" id="editar_talla_registrada_nombre" name="editar_talla_registrada_nombre"
                                    class="form-control" maxlength="99" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Estado Stock</label>
                                <select id="editar_talla_registrada_stock" name="editar_talla_registrada_stock"
                                    class="form-control" required>
                                    <option value="1">En Stock</option>
                                    <option value="0">Sin Stock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <a class="btn btn-primary text-uppercase" href="javascript:editarTallaRegistrada()">Editar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        var color_id = 0;

        function inicializar() {
            color_id = {{ $color->color_producto_id }};
            tallasRegistradas = {!! $color->tallas !!};
            cg = tallasRegistradas.length;
        }
        window.onload = inicializar;

        function guardarColor() {
            if ($('#nombre').val() == "") {
                Swal.fire({
                    type: "warning",
                    title: "Complete los campos",
                    text: "Por favor complete todos los campos para poder guardar su categoria.",
                    confirmButtonText: "Aceptar",
                    confirmButtonColor: "#2c5099",
                });
            } else {
                if (cg == 0) {
                    Swal.fire({
                        type: "warning",
                        title: "Sin Tallas",
                        text: "Por favor ingrese al menos una talla.",
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#2c5099",
                    });
                } else {
                    Swal.fire({
                        title: "Guardando Color de Producto",
                        allowOutsideClick: false
                    });
                    Swal.showLoading();
                    var token = '{{ csrf_token() }}';
                    var file_data = $('#inputGroupFile01')[0].files;
                    var file_data2 = $('#inputGroupFile02')[0].files;
                    var file_data3 = $('#inputGroupFile03')[0].files;
                    var data = new FormData();
                    data.append('_token', token);
                    data.append('image', file_data[0]);
                    data.append('image2', file_data2[0]);
                    data.append('image3', file_data3[0]);
                    data.append('id_image1', $('#imagen_1_id').val());
                    data.append('id_image2', $('#imagen_2_id').val());
                    data.append('id_image3', $('#imagen_3_id').val());
                    data.append('nombre', $('#nombre').val());
                    data.append('estado_principal', $('#estado_principal').val());
                    data.append('codigo_color', $('#codigo_color').val());
                    data.append('estado_stock', $('#estado_stock').val());
                    data.append('tallas', JSON.stringify(tallas));
                    data.append('tallasRegistradas', JSON.stringify(tallasRegistradas));
                    data.append('tallasEliminar', JSON.stringify(eliminarTallas));
                    data.append('id', color_id);
                    $.ajax({
                        type: "post",
                        url: "{{ route('colores_producto.update') }}",
                        data: data,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(result) {
                            swal.close();
                            if (result.error) {
                                Swal.fire({
                                    type: "error",
                                    title: "Ocurrio un error",
                                    text: 'Lo sentimos, no pudimos guardar los datos, por favor intentelo mas tarde.',
                                    confirmButtonText: "Aceptar",
                                    confirmButtonColor: "#2c5099",
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    title: "Se ha guardado tu color de producto correctamente",
                                    text: "Tu color se ha registrado correctamente!.",
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


                }
            }
        }
    </script>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/agregar_talla.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/js/image_preview.js') }}"></script>
@endsection
