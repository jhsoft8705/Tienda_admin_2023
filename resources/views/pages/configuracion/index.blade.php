@extends('layouts.app')

@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
                <h4 class="page-title">Configuracion de la pagina</h4>
            </li>
        </ul>
        <div class="section-body mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col-sm-5">
                                    <h4>Guia de la Pagina</h4>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-6">
                                    <h4>Informacion de la pagina</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- f -->
                            <div class="row no-gutters align-items-center">
                                <div class="col-sm-5">
                                    <form id="guia" method="POST" action="{{ route('configuracion.storeGuia') }}"
                                        class="needs-validation" novalidate enctype="multipart/form-data">

                                        <div class="form-group mr-3">

                                            <div id='img_container'><img class="preview" id="preview"
                                                    src="{{ asset('guia/' . $guia->imagen_guia) }}" alt="your image"
                                                    title='' /></div>
                                            <label>Imagen</label>
                                            <div class="input-group mt-4">
                                                <div class="custom-file files form-group">
                                                    <input type="file" id="imagenguia" name="imagenguiafile"
                                                        aria-describedby="inputGroupFileAddon01">
                                                </div>
                                            </div>
                                            <label class="mt-4">Videos</label>
                                            <div class="input-group mt-4">
                                                <div class="custom-file files form-group">
                                                    <input type="file" id="video" name="videoguia"
                                                        aria-describedby="inputGroupFileAddon02">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group pt-3">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary text-uppercase">Guardar</button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-6">
                                    <form id="info" method="POST" action="{{ route('configuracion.store') }}"
                                        class="needs-validation" novalidate>
                                        <div class="form-group">
                                            <label>Horario</label>
                                            <input type="text" value='{{ $configuracion->horario }}' name="horario"
                                                maxlength="199" class="form-control" required>
                                            <div class="invalid-feedback">Por favor ingrese horario</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nro. de Whatsapp</label>
                                            <input type="text" value='{{ $configuracion->whatsapp }}' name="whatsapp"
                                                maxlength="20" class="form-control" required>
                                            <div class="invalid-feedback">Por favor ingrese numero</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input type="text" value='{{ $configuracion->correo }}' name="correo"
                                                maxlength="199" class="form-control" required>
                                            <div class="invalid-feedback">Por favor ingrese correo</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Direccion</label>
                                            <input type="text" value='{{ $configuracion->direccion }}' name="direccion"
                                                maxlength="350" class="form-control" required>
                                            <div class="invalid-feedback">Por favor ingrese direccion</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" value='{{ $configuracion->facebook }}' name="facebook"
                                                maxlength="199" class="form-control" required>
                                            <div class="invalid-feedback">Por favor ingrese facebook</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea name="nosotros" class="form-control" maxlength="599"
                                                required>{{ $configuracion->nosotros }}</textarea>
                                            <div class="invalid-feedback">Por favor ingrese un texto valida</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Código Mapa: <a href="#modalTutorial" data-toggle="modal"
                                                    data-target="#modalTutorial">¿Como obtengo el código de mi
                                                    mapa?</a></label>
                                            <textarea name="mapa" class="form-control"
                                                required>{{ $configuracion->mapa }}</textarea>
                                            <div class="invalid-feedback">Por favor ingrese un mapa valido</div>
                                        </div>
                                        <div class="form-group">
                                            <label>URL Whatsapp:</label>
                                            <textarea name="url_whatsapp" class="form-control"
                                                required>{{ $configuracion->url_whatsapp }}</textarea>
                                            <div class="invalid-feedback">Por favor ingrese una url valido</div>
                                        </div>
                                        <div class="form-group pt-3">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary text-uppercase">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>




                            <!-- f -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalTutorial" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Como obtengo mi Código?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row m-0 text-center">
                    <div id="carouselExampleControls" data-interval="false" class="carousel slide w-100"
                        data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">

                                <h5>PASO 1: Ingresar a <a href="https://www.google.com/maps" target="_blank"
                                        class="font-weight-bold text-danger">GOOGLE MAPS</a>
                                    y encontrar la ubicación que deseamos
                                </h5>
                                <img style="width: 100%" src="{{ asset('assets/img/mapa/mapa_1.png') }}">

                            </div>
                            <div class="carousel-item">
                                <h5>PASO 2: Una vez seleccionada la ubicación le daremos a Compartir</h5>
                                <img style="width: 100%" src="{{ asset('assets/img/mapa/mapa_2.png') }}">
                            </div>
                            <div class="carousel-item">
                                <h5>PASO 3: Una vez aqui seleccionaremos la opción de Incorporar mapa, y aqui le daremos
                                    click en COPIAR HTML, luego solo la pegaremos en nuestro sistema para que se muestre en
                                    la página</h5>
                                <img style="width: 100%" src="{{ asset('assets/img/mapa/mapa_3.png') }}">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="material-icons color-black font-weight-bolder">
                                arrow_back_ios
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="material-icons color-black font-weight-bolder">
                                arrow_forward_ios
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/image_preview.js') }}"></script>
@endsection
