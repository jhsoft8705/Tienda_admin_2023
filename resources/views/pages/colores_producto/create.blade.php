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
                                <h4>Agregar Color a {{ $producto->nombre }}</h4>
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
                                    <input type="text" id="nombre" name="nombre" class="form-control" maxlength="99"
                                        required>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mr-3">
                                    <label>Pantalla de Inicio</label>
                                    <select id="estado_principal" name="estado_principal" class="form-control" required>
                                        <option value="0">No Mostrar</option>
                                        <option value="1">Mostrar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mr-3">
                                    <label>Estado</label>
                                    <select id="estado_stock" name="estado_stock" class="form-control" required>
                                        <option value="1">En Stock</option>
                                        <option value="0">Sin Stock</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" id="codigo_color" name="codigo_color" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row no-gutters align-items-center">
                            <div class="form-group">
                                <label>Tallas</label>
                                <div class="d-flex">
                                    <div id="tallas_container" class="d-flex">
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
                            <input type="hidden" name="producto_id" value="{{ $producto->producto_id }}" readonly />
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
                                        <div id='img_container_1'><img class="preview" id="preview1"
                                                src="{{ asset('assets/img/image-preview.jpg') }}" /></div>
                                        <div class="input-group">
                                            <div class="custom-file files form-group">
                                                <input class="py-4" type="file" id="inputGroupFile01" name="image"
                                                    aria-describedby="inputGroupFileAddon01">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="form-group mr-3">
                                        <label>Imagen 2</label>
                                        <div id='img_container_2'><img class="preview" id="preview2"
                                                src="{{ asset('assets/img/image-preview.jpg') }}" /></div>
                                        <div class="input-group">
                                            <div class="custom-file files form-group">
                                                <input class="py-4" type="file" id="inputGroupFile02"
                                                    name="image2" aria-describedby="inputGroupFileAddon02">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="form-group">
                                        <label>Imagen 3</label>
                                        <div id='img_container_3'><img class="preview" id="preview3"
                                                src="{{ asset('assets/img/image-preview.jpg') }}" /></div>
                                        <div class="input-group">
                                            <div class="custom-file files form-group">
                                                <input class="py-4" type="file" id="inputGroupFile03"
                                                    name="image3" aria-describedby="inputGroupFileAddon03">
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
    <script>
        var producto_id = 0;

        function inicializar() {
            producto_id = {{ $producto->producto_id }};
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
                if (c == 0) {
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
                    data.append('nombre', $('#nombre').val());
                    data.append('estado_principal', $('#estado_principal').val());
                    data.append('codigo_color', $('#codigo_color').val());
                    data.append('estado_stock', $('#estado_stock').val());
                    data.append('tallas', JSON.stringify(tallas));
                    data.append('id', producto_id);
                    $.ajax({
                        type: "post",
                        url: "{{ route('colores_producto.store') }}",
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
