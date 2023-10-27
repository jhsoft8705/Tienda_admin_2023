@extends('layouts.app')
@section('styles')
    <!-- Vendor -->
    <link href="{{ asset('assets/banner-editor/js/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/banner-editor/js/vendor/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/banner-editor/js/vendor/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Custom -->
    <link href="{{ asset('assets/banner-editor/css/style-banneredit.css') }}" rel="stylesheet">
    <!-- <link href="css/animate.css" rel="stylesheet"> -->
    <link href="{{ asset('assets/banner-editor/css/style.css') }}" rel="stylesheet">

    <!-- Icon Font -->
    <link href="{{ asset('assets/banner-editor/fonts/icomoon-reg/style.css') }}" rel="stylesheet">
    <script data-main="{{ asset('assets/banner-editor/js/app_banneredit') }}"
        src="{{ asset('assets/banner-editor/js/vendor/require/require.js') }}"></script>
@endsection
@section('content')
    <section class="section">
        <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
                <h4 class="page-title">Banners</h4>
            </li>
        </ul>
        <div class="section-body mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col-sm-6">
                                    <h4>Listado de Banners</h4>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="wrapper">
                                <!-- Page -->
                                <div class="page-wrapper">
                                    <div id="bannersEditor">
                                        <div class="tabbed-menu">
                                            <ul class="tabs">

                                                <li id="tab8" class="selected">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/1/' . $banner1->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Banner 1</h5>
                                                </li>
                                                <li id="tab7">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/2/' . $banner2->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Banner 2</h5>
                                                </li>
                                                <li id="tab6">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/3/' . $banner3->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Banner 3</h5>
                                                </li>


                                                <li id="tab9">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/4/' . $banner4->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Oferta 1</h5>
                                                </li>
                                                <li id="tab10">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/5/' . $banner5->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Oferta 2</h5>
                                                </li>
                                                <li id="tab13">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/6/' . $banner6->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Panel 1</h5>
                                                </li>
                                                <li id="tab14">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/7/' . $banner7->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Panel 2</h5>
                                                </li>
                                                <li id="tab15">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/8/' . $banner8->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Panel 3</h5>
                                                </li>
                                                <li id="tab16">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/9/' . $banner9->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Panel 4</h5>
                                                </li>
                                                <li id="tab17">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/10/' . $banner10->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Panel 5</h5>
                                                </li>
                                                <li id="tab18">
                                                    <div class="banner-img"><img
                                                            src="{{ asset('banner/11/' . $banner11->imagen) }}" alt="">
                                                    </div>
                                                    <h5>Panel 6</h5>
                                                </li>

                                            </ul>
                                            <div class="contentWrapper">
                                                <div class="content">
                                                    <!-- BANNER PRINCIPAL 1 -->
                                                    <div class="page visible" id="tab8">
                                                        <!-- 6 -->
                                                        <div class="block banner-edit" id="banner-6">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Banner 1 Principal</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner banner-caption  style-6 autosize-text {{ $banner1->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="19.2">
                                                                                        <figure><img id='preview1'
                                                                                                src="{{ asset('banner/1/' . $banner1->imagen) }}"
                                                                                                alt=""></figure>
                                                                                        <div class="text2-1"> DEYABÚ
                                                                                        </div>
                                                                                        <div class="text-1 text2-2">
                                                                                            {{ $banner1->texto_1 }}</div>
                                                                                        <div class="text-2 text2-3">
                                                                                            {{ $banner1->texto_2 }}</div>
                                                                                        <div class="text-3 text2-4">
                                                                                            {{ $banner1->texto_3 }}</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-6">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings6">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text6-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text6-2">Texto 2</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text6-3">Texto 3</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings6"
                                                                                    class="tab-pane fade in active">

                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label for="image">Imagen
                                                                                                Recomendado (1813x708px):</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner1"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Banner</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace1_1"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner1->link_imagen == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner1->link_imagen == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner1->link_imagen == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner1->link_imagen == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner1->link_imagen == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->sub_categoria_producto_id }}"
                                                                                                            {{ $banner1->link_imagen == 'categorias.index-' . $categoria->sub_categoria_producto_id ? 'selected' : '' }}>
                                                                                                            {{ $categoria->categoria->nombre }}:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox6"
                                                                                                    {{ $banner1->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label for='checkbox6'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text6-1" class="tab-pane fade">
                                                                                    <div class="edit-text-6-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_1" name="text"
                                                                                            class="form-control text"></textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div id="text6-2" class="tab-pane fade">
                                                                                    <div class="edit-text-6-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_1" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text6-3" class="tab-pane fade">
                                                                                    <div class="edit-text-6-3">
                                                                                        <label>Porcentaje de
                                                                                            Descuento:</label>
                                                                                        <textarea id="texto3_1" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="1"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                                {{-- <a href="javascript:guardar(1)" class="btn"  type="button" class="btn" >GUARDAR</a> --}}

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- BANNER PRINCIPAL 1 -->

                                                    <!-- BANNER PRINCIPAL 2 -->
                                                    <div class="page" id="tab7">
                                                        <!-- 5 -->
                                                        <div class="block banner-edit" id="banner-5">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Banner 2 Principal</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner banner-caption  style-5 autosize-text {{ $banner2->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="10">
                                                                                        <figure>
                                                                                            <img id="preview2"
                                                                                                src="{{ asset('banner/2/' . $banner2->imagen) }}"
                                                                                                alt="" />
                                                                                        </figure>

                                                                                        <div class="text-1 text3-1">
                                                                                            {{ $banner2->texto_1 }}</div>
                                                                                        <div class="text-2 text3-4">
                                                                                            {{ $banner2->texto_2 }}</div>
                                                                                        <a
                                                                                            class="text-3 text3-6">{{ $banner2->texto_boton }}</a>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-5">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings5">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text5-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text5-2">Texto 2</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text5-3">Texto Boton</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings5"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen Recomendado (1813x708px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner2"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Banner</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace1_2"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner2->link_imagen == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner2->link_imagen == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner2->link_imagen == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner2->link_imagen == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner2->link_imagen == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner2->link_imagen == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_2"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner2->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner2->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner2->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner2->link_boton == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner2->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner2->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox5"
                                                                                                    {{ $banner2->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label for='checkbox5'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="text5-1" class="tab-pane fade">
                                                                                    <div class="edit-text-5-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_2" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text5-2" class="tab-pane fade">
                                                                                    <div class="edit-text-5-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_2" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text5-3" class="tab-pane fade">
                                                                                    <div class="edit-text-5-3">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="textoboton_2"
                                                                                            name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="2"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- BANNER PRINCIPAL 2 -->

                                                    <!-- BANNER PRINCIPAL 3 -->
                                                    <div class="page" id="tab6">
                                                        <!-- 4 -->
                                                        <div class="block banner-edit" id="banner-4">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Banner Principal 3</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner style-4 autosize-text {{ $banner3->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="10">
                                                                                        <figure><img id="preview3"
                                                                                                src="{{ asset('banner/3/' . $banner3->imagen) }}"
                                                                                                alt=""></figure>
                                                                                        <div
                                                                                            class="caption  banner-caption">
                                                                                            <div class="text-banner-1">
                                                                                                DEYABÚ </div>
                                                                                            <div
                                                                                                class="text-1 text-banner-2">
                                                                                                {{ $banner3->texto_1 }}
                                                                                            </div>
                                                                                            <div
                                                                                                class="text-2 text-banner-3">
                                                                                                {{ $banner3->texto_2 }}
                                                                                            </div>

                                                                                            <!-- coolbutton -->
                                                                                            <a class="cool-btn"
                                                                                                style="-webkit-clip-path: url(#coolButton); clip-path: url(#coolButton);">
                                                                                                <span>VER MÁS</span> </a>
                                                                                            <svg class="clip-svg">
                                                                                                <defs>
                                                                                                    <clipPath
                                                                                                        id="coolButton"
                                                                                                        clipPathUnits="objectBoundingBox">
                                                                                                        <polygon
                                                                                                            points="0 .18, .99 .15, .91 .85, .07 .8" />
                                                                                                    </clipPath>
                                                                                                </defs>
                                                                                            </svg>
                                                                                            <!-- // coolbutton -->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-4">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings4">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text4-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text4-2">Texto 2</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings4"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen Recomendado (1813x708px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner3"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Banner</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace1_3"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner3->link_imagen == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner3->link_imagen == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner3->link_imagen == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner3->link_imagen == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner3->link_imagen == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner3->link_imagen == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_3"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner3->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner3->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner3->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index {{ $banner3->link_boton == 'contactanos.index' ? 'selected' : '' }}">
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner3->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner3->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox4"
                                                                                                    {{ $banner3->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label for='checkbox4'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text4-1" class="tab-pane fade">
                                                                                    <div class="edit-text-4-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_3" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text4-2" class="tab-pane fade">
                                                                                    <div class="edit-text-4-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_3" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="3"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- BANNER PRINCIPAL 3 -->
                                                    <div class="page" id="tab9">

                                                        <!-- 7 -->
                                                        <div class="block banner-edit" id="banner-7">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Banner Oferta 1</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner style-7 autosize-text {{ $banner4->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="9.6">
                                                                                        <img id="preview4"
                                                                                            src="{{ asset('banner/4/' . $banner4->imagen) }}"
                                                                                            alt="Banner" />
                                                                                        <div
                                                                                            class="banner-caption horr vertc">
                                                                                            <div class="vert-wrapper">
                                                                                                <div
                                                                                                    class="vert">
                                                                                                    <div
                                                                                                        class="text-3">
                                                                                                        <span
                                                                                                            class="text-3-inner">{{ $banner4->texto_3 }}</span>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="text-1">
                                                                                                        {{ $banner4->texto_1 }}
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="text-2">
                                                                                                        {{ $banner4->texto_2 }}
                                                                                                    </div>
                                                                                                    <a
                                                                                                        class="banner-btn-wrap">
                                                                                                        <div class="banner-btn text-hoverslide"
                                                                                                            data-hcolor="#4166AC">
                                                                                                            <span><span
                                                                                                                    class="text">{{ $banner4->texto_boton }}</span><span
                                                                                                                    class="hoverbg"></span></span>
                                                                                                        </div>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-7">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings7">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text7-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text7-2">Texto 2</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text7-3">Texto 3</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#btn7-1">Boton</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings7"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen Recomendado (958x458px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image4"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner4"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_4"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner4->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner4->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner4->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner4->link_boton == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner4->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner4->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox7"
                                                                                                    {{ $banner4->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label for='checkbox7'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text7-1" class="tab-pane fade">
                                                                                    <div class="edit-text-7-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_4" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text7-2" class="tab-pane fade">
                                                                                    <div class="edit-text-7-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_4" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text7-3" class="tab-pane fade">
                                                                                    <div class="edit-text-7-3">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto3_4" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="btn7-1" class="tab-pane fade">
                                                                                    <div class="edit-text-7-4">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="textoboton_4"
                                                                                            name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="4"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="page" id="tab10">
                                                        <!-- 8 -->
                                                        <div class="block banner-edit" id="banner-8">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Banner Oferta 2</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner style-8 autosize-text {{ $banner5->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="10">
                                                                                        <img id="preview5"
                                                                                            src="{{ asset('banner/5/' . $banner5->imagen) }}"
                                                                                            alt="Banner" />
                                                                                        <div
                                                                                            class="banner-caption horr vertc">
                                                                                            <div class="vert-wrapper">
                                                                                                <div
                                                                                                    class="vert">
                                                                                                    <div
                                                                                                        class="text-1">
                                                                                                        {{ $banner5->texto_1 }}
                                                                                                    </div>
                                                                                                    <a
                                                                                                        class="banner-btn-wrap">
                                                                                                        <div class="banner-btn text-hoverslide"
                                                                                                            data-hcolor="#67E0FA">
                                                                                                            <span><span
                                                                                                                    class="text">{{ $banner5->texto_boton }}</span><span
                                                                                                                    class="hoverbg"></span></span>
                                                                                                        </div>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-8">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings8">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text8-1">Texto</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#btn8-1">Boton</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings8"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen (958x458px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner5"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_5"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner5->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner5->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner5->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner5->link_boton == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner5->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner5->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox8"
                                                                                                    {{ $banner5->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label for='checkbox8'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text8-1" class="tab-pane fade">
                                                                                    <div class="edit-text-8-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_5" name="text"
                                                                                            class="form-control text"></textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div id="btn8-1" class="tab-pane fade">
                                                                                    <div class="edit-text-8-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_5" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="5"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>



                                                    <div class="page" id="tab13">
                                                        <!-- 11 -->
                                                        <div class="block banner-edit" id="banner-11">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Panel Ofertas 1</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-6 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner style-11 autosize-text {{ $banner6->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="4.2">
                                                                                        <img id="preview6"
                                                                                            src="{{ asset('banner/6/' . $banner6->imagen) }}"
                                                                                            alt="Banner">
                                                                                        <div
                                                                                            class="banner-caption vertb horc">
                                                                                            <div class="vert-wrapper">
                                                                                                <div
                                                                                                    class="vert">
                                                                                                    <div
                                                                                                        class="text-1">
                                                                                                        {{ $banner6->texto_1 }}
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="text-2">
                                                                                                        {{ $banner6->texto_2 }}
                                                                                                    </div>
                                                                                                    <a
                                                                                                        class="banner-btn-wrap">
                                                                                                        <div class="banner-btn text-hoverslide"
                                                                                                            data-hcolor="#4166AC">
                                                                                                            <span><span
                                                                                                                    class="text">{{ $banner6->texto_boton }}</span><span
                                                                                                                    class="hoverbg"></span></span>
                                                                                                        </div>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-11">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings11">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text11-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text11-2">Texto 2</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#btn11-1">Boton</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings11"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen (424x678px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner6"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_6"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner6->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner6->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner6->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner6->link_boton == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner6->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner6->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox11"
                                                                                                    {{ $banner6->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    for='checkbox11'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text11-1" class="tab-pane fade">
                                                                                    <div class="edit-text-11-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_6" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text11-2" class="tab-pane fade">
                                                                                    <div class="edit-text-11-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_6" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="btn11-1" class="tab-pane fade">
                                                                                    <div class="edit-text-11-3">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="textoboton_6"
                                                                                            name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="6"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="page" id="tab14">

                                                        <!-- 12 -->
                                                        <div class="block banner-edit" id="banner-12">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Panel Ofertas 2</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-6 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner style-12 autosize-text {{ $banner7->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="4.2">
                                                                                        <img id="preview7"
                                                                                            src="{{ asset('banner/7/' . $banner7->imagen) }}"
                                                                                            alt="Banner">
                                                                                        <div
                                                                                            class="banner-caption vertb horc">
                                                                                            <div class="vert-wrapper">
                                                                                                <div
                                                                                                    class="vert">
                                                                                                    <a
                                                                                                        class="banner-btn-wrap">
                                                                                                        <div class="banner-btn text-hover"
                                                                                                            data-hcolor="#ffffff">
                                                                                                            <span><span
                                                                                                                    class="text">{{ $banner7->texto_boton }}</span><span
                                                                                                                    class="hoverbg"></span></span>
                                                                                                        </div>
                                                                                                    </a>
                                                                                                    <div
                                                                                                        class="text-1">
                                                                                                        {{ $banner7->texto_1 }}
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="text-2">
                                                                                                        {{ $banner7->texto_2 }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-12">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings12">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text12-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text12-2">Texto 2</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#btn12-1">Boton</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings12"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label for="image">Imagen (424x678px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner7"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_7"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner7->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner7->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner7->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner7->link_boton == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner7->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner7->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox12"
                                                                                                    {{ $banner7->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    for='checkbox12'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text12-1" class="tab-pane fade">
                                                                                    <div class="edit-text-12-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_7" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text12-2" class="tab-pane fade">
                                                                                    <div class="edit-text-12-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_7" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="btn12-1" class="tab-pane fade">
                                                                                    <div class="edit-text-12-3">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="textoboton_7"
                                                                                            name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="7"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="page" id="tab15">
                                                        <!-- 13 -->
                                                        <div class="block banner-edit" id="banner-13">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Panel Ofertas 3</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-8 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner style-13 autosize-text {{ $banner8->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="4.6">
                                                                                        <img id="preview8"
                                                                                            src="{{ asset('banner/8/' . $banner8->imagen) }}"
                                                                                            alt="Banner">
                                                                                        <div
                                                                                            class="banner-caption vertt horc">
                                                                                            <div class="vert-wrapper">
                                                                                                <div
                                                                                                    class="vert">
                                                                                                    <div
                                                                                                        class="text-1">
                                                                                                        {{ $banner8->texto_1 }}
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="text-2">
                                                                                                        {{ $banner8->texto_2 }}
                                                                                                    </div>
                                                                                                    <a
                                                                                                        class="banner-btn-wrap">
                                                                                                        <div class="banner-btn text-hoverslide"
                                                                                                            data-hcolor="#4166AC">
                                                                                                            <span><span
                                                                                                                    class="text">{{ $banner8->texto_boton }}</span><span
                                                                                                                    class="hoverbg"></span></span>
                                                                                                        </div>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-13">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings13">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text13-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text13-2">Texto 2</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#btn13-1">Boton</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings13"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen (920x736px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner8"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_8"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner8->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner8->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner8->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner8->link_boton == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner8->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner8->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox13"
                                                                                                    {{ $banner8->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    for='checkbox13'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text13-1" class="tab-pane fade">
                                                                                    <div class="edit-text-13-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_8" name="text"
                                                                                            class="form-control text"></textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div id="text13-2" class="tab-pane fade">
                                                                                    <div class="edit-text-13-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_8" name="text"
                                                                                            class="form-control text"></textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div id="btn13-1" class="tab-pane fade">
                                                                                    <div class="edit-text-13-3">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="textoboton_8"
                                                                                            name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="8"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="page" id="tab16">

                                                        <!-- 14 -->
                                                        <div class="block banner-edit" id="banner-14">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Panel Ofertas 4</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-8 pull-right">
                                                                                <div class="output-banner">
                                                                                    <div class="banner style-14 autosize-text {{ $banner9->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                        data-fontratio="4.6">
                                                                                        <img id="preview9"
                                                                                            src="{{ asset('banner/9/' . $banner9->imagen) }}"
                                                                                            alt="Banner">
                                                                                        <div
                                                                                            class="banner-caption vertc horl">
                                                                                            <div class="vert-wrapper">
                                                                                                <div
                                                                                                    class="vert">
                                                                                                    <div
                                                                                                        class="text-1">
                                                                                                        {{ $banner9->texto_1 }}
                                                                                                    </div>
                                                                                                    <a
                                                                                                        class="banner-btn-wrap">
                                                                                                        <div class="banner-btn text-hoverslide"
                                                                                                            data-hcolor="#4166AC">
                                                                                                            <span><span
                                                                                                                    class="text">{{ $banner9->texto_boton }}</span><span
                                                                                                                    class="hoverbg"></span></span>
                                                                                                        </div>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-14">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings14">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text14-1">Texto</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#btn14-1">Boton</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings14"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen (920x736px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner9"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_9"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner9->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner9->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner9->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner9->link_boton == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner9->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner9->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox14"
                                                                                                    {{ $banner9->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    for='checkbox14'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text14-1" class="tab-pane fade">
                                                                                    <div class="edit-text-14-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_9" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="btn14-1" class="tab-pane fade">
                                                                                    <div class="edit-text-14-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="textoboton_9"
                                                                                            name="text"
                                                                                            class="form-control text"></textarea>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="9"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="page" id="tab17">

                                                        <!-- 15 -->
                                                        <div class="block banner-edit" id="banner-15">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Panel Ofertas 5</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-8 pull-right">
                                                                                <div class="output-banner">
                                                                                    <a class="banner-wrap">
                                                                                        <div class="banner style-15 autosize-text {{ $banner10->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                            data-fontratio="4.6">
                                                                                            <img id="preview10"
                                                                                                src="{{ asset('banner/10/' . $banner10->imagen) }}"
                                                                                                alt="Banner">
                                                                                            <div
                                                                                                class="banner-caption vertc horl">
                                                                                                <div
                                                                                                    class="vert-wrapper">
                                                                                                    <div
                                                                                                        class="vert">
                                                                                                        <div
                                                                                                            class="text-1">
                                                                                                            {{ $banner10->texto_1 }}
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="text-2">
                                                                                                            {{ $banner10->texto_2 }}
                                                                                                        </div>
                                                                                                        <div class="banner-btn text-hover"
                                                                                                            data-hcolor="#ffffff">
                                                                                                            <span><span
                                                                                                                    class="text">{{ $banner10->texto_boton }}</span><span
                                                                                                                    class="hoverbg"></span></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-15">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings15">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text15-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text15-2">Texto 2</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#btn15-1">Boton</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings15"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen (920x736px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner10"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Banner</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace1_10"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner10->link_imagen == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner10->link_imagen == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner10->link_imagen == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner10->link_imagen == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner10->link_imagen == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner10->link_imagen == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Boton</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace2_10"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner10->link_boton == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner10->link_boton == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner10->link_boton == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner10->link_boton == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner10->link_boton == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner10->link_boton == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox15"
                                                                                                    {{ $banner10->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    for='checkbox15'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text15-1" class="tab-pane fade">
                                                                                    <div class="edit-text-15-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_10" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text15-2" class="tab-pane fade">
                                                                                    <div class="edit-text-15-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_10" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="btn15-1" class="tab-pane fade">
                                                                                    <div class="edit-text-15-3">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="textoboton_10"
                                                                                            name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="10"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="page" id="tab18">

                                                        <!-- 16 -->
                                                        <div class="block banner-edit" id="banner-16">
                                                            <div class="container mt-0">
                                                                <h2 class="text-center">Panel Ofertas 6</h2>
                                                                <!-- Banner -->
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-8 pull-right">
                                                                                <div class="output-banner">
                                                                                    <a class="banner-wrap">
                                                                                        <div class="banner style-16 autosize-text {{ $banner11->estado_hover == 1 ? 'image-hover-scale' : '' }}"
                                                                                            data-fontratio="4.6">
                                                                                            <img id="preview11"
                                                                                                src="{{ asset('banner/11/' . $banner11->imagen) }}"
                                                                                                alt="Banner">
                                                                                            <div
                                                                                                class="banner-caption vertc horr">
                                                                                                <div
                                                                                                    class="vert-wrapper">
                                                                                                    <div
                                                                                                        class="vert">
                                                                                                        <div
                                                                                                            class="text-1">
                                                                                                            {{ $banner11->texto_1 }}
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="text-2">
                                                                                                            {{ $banner11->texto_2 }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xlg-5">
                                                                        <form class="edit-banner-16">
                                                                            <ul class="nav-tabs">
                                                                                <li class="active"><a
                                                                                        data-toggle="tab"
                                                                                        href="#settings16">Configuracion</a>
                                                                                </li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text16-1">Texto 1</a></li>
                                                                                <li><a data-toggle="tab"
                                                                                        href="#text16-2">Texto 2</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div id="settings16"
                                                                                    class="tab-pane fade in active">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label
                                                                                                for="image">Imagen (920x736px)</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <input type="hidden"
                                                                                                name="image"
                                                                                                class="form-control image">
                                                                                            <input type="file"
                                                                                                id="imagenbanner11"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Enlace en Banner</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="select-wrapper-sm">
                                                                                                <select id="enlace1_11"
                                                                                                    class="form-control input-sm h-100">
                                                                                                    <option
                                                                                                        value="inicio.index"
                                                                                                        {{ $banner11->link_imagen == 'inicio.index' ? 'selected' : '' }}>
                                                                                                        Pagina de Inicio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="faq.index"
                                                                                                        {{ $banner11->link_imagen == 'faq.index' ? 'selected' : '' }}>
                                                                                                        Preguntas Frecuentes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="nosotros.index"
                                                                                                        {{ $banner11->link_imagen == 'nosotros.index' ? 'selected' : '' }}>
                                                                                                        Nosotros</option>
                                                                                                    <option
                                                                                                        value="contactanos.index"
                                                                                                        {{ $banner11->link_imagen == 'contactanos.index' ? 'selected' : '' }}>
                                                                                                        Contactanos</option>
                                                                                                    @foreach ($productos as $producto)
                                                                                                        @foreach ($producto->colores as $color)
                                                                                                            @if ($producto->estado_stock == 1)
                                                                                                                <option
                                                                                                                    value="productos.index-{{ $color->color_producto_id }}"
                                                                                                                    {{ $banner11->link_imagen == 'productos.index-' . $color->color_producto_id ? 'selected' : '' }}>
                                                                                                                    PRODUCTO:
                                                                                                                    {{ $producto->nombre . ' ' . $color->nombre }}
                                                                                                                </option>
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                    @foreach ($categorias as $categoria)
                                                                                                        <option
                                                                                                            value="categorias.index-{{ $categoria->categoria_producto_id }}"
                                                                                                            {{ $banner11->link_imagen == 'categorias.index-' . $categoria->categoria_producto_id ? 'selected' : '' }}>
                                                                                                            CATEGORIA:
                                                                                                            {{ $categoria->nombre }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label>Zoom con el
                                                                                                Cursor</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="checkbox-group">
                                                                                                <input type="checkbox"
                                                                                                    name="hoverscale"
                                                                                                    class="hoverscale"
                                                                                                    id="checkbox16"
                                                                                                    {{ $banner11->estado_hover == 1 ? 'checked' : '' }}>
                                                                                                <label
                                                                                                    for='checkbox16'><span
                                                                                                        class="check"></span><span
                                                                                                        class="box"></span>&nbsp;</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text16-1" class="tab-pane fade">
                                                                                    <div class="edit-text-16-1">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto1_11" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="text16-2" class="tab-pane fade">
                                                                                    <div class="edit-text-16-2">
                                                                                        <label>Texto</label>
                                                                                        <textarea id="texto2_11" name="text"
                                                                                            class="form-control text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <button class="btn guardarBtn" id="11"
                                                                                    type="button"
                                                                                    class="btn">GUARDAR</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /Banner -->
                                                            </div>
                                                        </div>

                                                    </div>




                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <!-- /Page -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade zoom banner-edit-modal" id="modalOutput">
                <div class="modal-dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">&#10006;</button>
                    </div>
                    <div class="modal-content">
                        <div class="modal-body">
                            <textarea id="output" name="output" class="form-control output"></textarea>
                            <button class="btn btn-sm" id="copyButton"><i
                                    class="icon icon-copy"></i>&nbsp;Copy</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade zoom banner-edit-modal" id="modalOutputCode">
                <div class="modal-dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">&#10006;</button>
                    </div>
                    <div class="modal-content">
                        <div class="modal-body">
                            <textarea id="outputcode" name="output" class="form-control output"></textarea>
                            <button class="btn btn-sm" id="minCodeAll">Minify</button>
                            <button class="btn btn-sm" id="formatCodeAll">Prettify</button>
                            <button class="btn btn-sm btngreen" id="copyButtonAll"><i
                                    class="icon icon-copy"></i>&nbsp;Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var routeName = "";
        var routeNameRedirec = "";
        var token = "";

        function variables() {
            routeName = "{{ route('banners.update') }}";
            routeNameRedirec = "{{ route('banners.index') }}";
            token = "{{ csrf_token() }}";

        }
        window.onload = variables;

        $(document).ready(function() {
            if ($("#imagenbanner1").length > 0) {
                $("#imagenbanner1").change(function(event) {
                    readURL(this, 1);
                });
            }
            if ($("#imagenbanner2").length > 0) {
                $("#imagenbanner2").change(function(event) {
                    readURL(this, 2);
                });
            }
            if ($("#imagenbanner3").length > 0) {
                $("#imagenbanner3").change(function(event) {
                    readURL(this, 3);
                });
            }
            if ($("#imagenbanner4").length > 0) {
                $("#imagenbanner4").change(function(event) {
                    readURL(this, 4);
                });
            }
            if ($("#imagenbanner5").length > 0) {
                $("#imagenbanner5").change(function(event) {
                    readURL(this, 5);
                });
            }
            if ($("#imagenbanner6").length > 0) {
                $("#imagenbanner6").change(function(event) {
                    readURL(this, 6);
                });
            }
            if ($("#imagenbanner7").length > 0) {
                $("#imagenbanner7").change(function(event) {
                    readURL(this, 7);
                });
            }
            if ($("#imagenbanner8").length > 0) {
                $("#imagenbanner8").change(function(event) {
                    readURL(this, 8);
                });
            }
            if ($("#imagenbanner9").length > 0) {
                $("#imagenbanner9").change(function(event) {
                    readURL(this, 9);
                });
            }
            if ($("#imagenbanner10").length > 0) {
                $("#imagenbanner10").change(function(event) {
                    readURL(this, 10);
                });
            }
            if ($("#imagenbanner11").length > 0) {
                $("#imagenbanner11").change(function(event) {
                    readURL(this, 11);
                });
            }

        });

        function readURL(input, idImagen) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#preview" + idImagen).attr("src", e.target.result);
                    $("#preview" + idImagen).hide();
                    $("#preview" + idImagen).fadeIn(500);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
