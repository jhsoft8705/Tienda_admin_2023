@extends('layouts.app')

@section('content')
<section class="section">
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
                                <h4>Agregar Producto</h4>
                            </div>
                            <div class="col-sm-6 text-right justify-content-end d-flex">
                                <a href="{{ route('productos.index') }}"class="btn btn-light text-uppercase rounded-0">Volver</a>
                            </div>
                        </div>                       
                    </div>                
                    <div class="card-body">
                        <!-- f -->
                        
                        <form method="POST" action="{{ route('productos.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">                    
                          
                            <div class="row no-gutters align-items-center">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" maxlength="99" required>
                                        <div class="invalid-feedback">Por favor ingrese un nombre valido</div>
                                        @if($errors->has('nombre'))
                                        <div class="invalid-message-feedback">{{ $errors->first('nombre') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea name="descripcion" class="form-control" maxlength="199"></textarea>
                                <div class="invalid-feedback">Por favor ingrese una descripción valida</div>
                            </div>     

                            <div class="row no-gutters align-items-center">
                                <div class="col-sm-2">
                                    <div class="form-group mr-3">
                                        <label>Precio:</label>
                                        <input type="number" name="precio" class="form-control" placeholder="0.00" step="0.01" required>
                                        <div class="invalid-feedback">Por favor ingrese un precio valido</div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mr-3">
                                        <label>Precio Oferta:</label>
                                        <input type="number" name="precio_oferta" class="form-control" placeholder="0.00" step="0.01" required>
                                        <div class="invalid-feedback">Por favor ingrese un precio valido</div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mr-3">
                                        <label>Material</label>
                                        <input type="text" name="material" class="form-control" required>
                                        <div class="invalid-feedback">Por favor ingrese un material valido</div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mr-3">
                                        <label>Estado</label>
                                        <select name="estado" class="form-control" required>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mr-3">
                                        <label>Estado Stock</label>
                                        <select name="estado_stock" class="form-control" required>
                                            <option value="1">En Stock</option>
                                            <option value="0">Sin Stock</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                        
                                <div class="col-sm">
                                    <div class="form-group mr-3">
                                        <label>Estado Oferta</label>
                                        <select id="estado_oferta" name="estado_oferta" class="form-control" required>
                                            <option value="0">Precio Normal</option>
                                            <option value="1">En Oferta</option>
                                            <option value="2">En Oferta por Tiempo Limitado</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="tiempo_div" class="col-sm d-none">
                                    <div  class="form-group mr-3">
                                        <label>Valida hasta:</label>
                                        <input type="datetime-local" id="tiempo" name="tiempo" min="{{date("Y-m-d") .'T'.date("h:i")}}" class="form-control">
                                        <div class="invalid-feedback">Por favor ingrese un tiempo valido</div>
                                        </div>
                                </div>

                                <div id="imagen_tiempo_div" class="col-sm d-none mt-3">
                                    <div class="form-check my-6 d-flex align-items-center">
                                        <input class="form-check-input check-box" type="checkbox" value="" name="imagenTiempoCheck" id="imagenTiempoCheck" onchange="mostrarImagenTiempo(this)">
                                        <label class="form-check-label label-check-box pr-1" for="imagenTiempoCheck">
                                          Mostrar oferta por tiempo
                                        </label>
                                        <a id="btn_edit_imagen_tiempo" class="btn btn_primary p-0 d-none" data-target="#imagenTiempoModal" data-toggle="modal" href="#imagenTiempoModal"><span class="material-icons">
                                            edit
                                            </span></a>
                                      </div>
                                </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-sm-6 d-flex">
                                    <div class="form-group" style="flex-basis: 100%">
                                            <label>Sub Categoria del Producto:</label>
                                            <select name="sub_categoria_producto_id" id="sub_categoria_producto_id" class="form-control" required>
                                                @foreach($subcategorias as $subcategorias)
                                                <option value="{{ $subcategorias->sub_categoria_producto_id }}">{{ $subcategorias->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Por favor Seleccione una Categoria</div>
                                    </div>
                                    <div class="align-self-end p-0 pb-2">
                                        <a class="btn btn_primary" data-target="#categoriaModal" data-toggle="modal" href="#categoriaModal"><span class="material-icons font-40">
                                            add_circle
                                            </span></a>
                                    </div>
                             
                                </div>
                                <div class="col-sm-6 d-flex">
                                    <div class="form-group" style="flex-basis: 100%">
                                        <label>Marca del Producto:</label>
                                        <select name="marca_producto_id" id="marca_producto_id" class="form-control" required>
                                            @foreach($marcas as $marca)
                                            <option value="{{ $marca->marca_producto_id }}">{{ $marca->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Por favor Seleccione una Marca</div>
                                    </div>
                                    <div class="align-self-end p-0 pb-2">
                                        <a class="btn btn_primary" data-target="#marcaModal" data-toggle="modal" href="#marcaModal"><span class="material-icons font-40">
                                            add_circle
                                            </span></a>
                                    </div>

                               
                                </div>
                            </div>

                            <div class="form-group row pt-4">
                                {{ csrf_field() }}
                                    <div class="col-sm">
                                        <button type="submit" class="btn btn-primary text-uppercase">Guardar</button>
                                    </div>
                                    <div class="col-sm">
                                     

                                          <div class="form-check my-6 d-flex align-items-center">
                                            <input class="form-check-input check-box" type="checkbox" value="" name="imagenCheck" id="imagenCheck" onchange="mostrarImagen(this)">
                                            <label class="form-check-label label-check-box pr-1" for="imagenCheck">
                                                Mostrar producto en banner                                            </label>
                                            <a id="btn_edit_imagen" class="btn btn_primary p-0 d-none" data-target="#imagenModal" data-toggle="modal" href="#imagenModal"><span class="material-icons">
                                                edit
                                                </span></a>
                                          </div>
                                    </div>
                               
                            </div>
                      
                        <!-- f -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="imagenTiempoModal" tabindex="-1" role="dialog" aria-labelledby="imageTiempoTitulo" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="imageTiempoTitulo">Imagen Banner Inicio Oferta</h5>
        </div>
        <div class="modal-body">                  
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-4">
                        <div class="form-group mr-3">
                            <label>Imagen</label>
                            <div><img class="preview" id="preview2" src="{{ asset('assets/img/image-preview.jpg') }}" alt="your image" title=''/></div> 
                                <div class="input-group"> 
                                <div class="custom-file files form-group">
                                <input type="file" id="inputGroupFile02" name="image2"  aria-describedby="inputGroupFileAddon02">
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8" >
                        <img class="w-100 mb-3" src="{{ asset('assets/img/imagen_tiempo_banner.png') }}" alt="your image" title=''/>      

                    <div class="form-group pt-3 d-flex">
                        <a class="btn btn-secondary text-uppercase mr-2 w-100" href="javascript:cancelarImagenInicio()">Cancelar</a>

                        <a class="btn btn-primary text-uppercase ml-2 w-100" href="javascript:validarImagenInicio()">Aceptar</a>
                    </div>
                    </div>
                </div>
            
         
          
        </div>
    </div>
    </div>
</div>
<div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="imageTitulo" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="imageTitulo">Imagen Principal</h5>
        </div>
        <div class="modal-body">                  
            <img class="w-100 mb-3" src="{{ asset('assets/img/imagen-banner-numeros.png') }}" alt="your image" title=''/>      
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-4">
                        <div class="form-group mr-3">
                            <label>Imagen (*Recomendable en formato PNG sin fondo)</label>
                            <div id='img_container'><img class="preview" id="preview1" src="{{ asset('assets/img/image-preview.jpg') }}" alt="your image" title=''/></div> 
                                <div class="input-group"> 
                                <div class="custom-file files form-group">
                                <input type="file" id="inputGroupFile01" name="image"  aria-describedby="inputGroupFileAddon01">
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8" >
                        <div class="form-group w-100">
                            <label>Orden:</label>
                            <select name="orden_imagen" id="orden_imagen" class="form-control">
                                <option value="1">Imagen 1 - {{ ($productos_imagenes->slice(0,1)->first()) ? $productos_imagenes->slice(0,1)->first()->nombre : 'Vacio'}}</option>
                                <option value="2">Imagen 2 - {{ ($productos_imagenes->slice(1,1)->first()) ? $productos_imagenes->slice(1,1)->first()->nombre : 'Vacio'}}</option>
                                <option value="3">Imagen 3 - {{ ($productos_imagenes->slice(2,1)->first()) ? $productos_imagenes->slice(2,1)->first()->nombre : 'Vacio'}}</option>
                                <option value="4">Imagen 4 - {{ ($productos_imagenes->slice(3,1)->first()) ? $productos_imagenes->slice(3,1)->first()->nombre : 'Vacio'}}</option>
                                <option value="5">Imagen 5 - {{ ($productos_imagenes->slice(4,1)->first()) ? $productos_imagenes->slice(4,1)->first()->nombre : 'Vacio'}}</option>
                                <option value="6">Imagen 6 - {{ ($productos_imagenes->slice(5,1)->first()) ? $productos_imagenes->slice(5,1)->first()->nombre : 'Vacio'}}</option>
                                <option value="7">Imagen 7 - {{ ($productos_imagenes->slice(6,1)->first()) ? $productos_imagenes->slice(6,1)->first()->nombre : 'Vacio'}}</option>
                            </select>
                            <div class="invalid-feedback">Por favor Seleccione una Categoria</div>
                    </div>
                    <div class="form-group pt-3 d-flex">
                        <a class="btn btn-secondary text-uppercase mr-2 w-100" href="javascript:cancelarImagen()">Cancelar</a>

                        <a class="btn btn-primary text-uppercase ml-2 w-100" href="javascript:validarImagen()">Aceptar</a>
                    </div>
                    </div>
                </div>
            
         
          
        </div>
    </div>
    </div>
</div>
</form>
<div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="categoriaTitutlo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="categoriaTitutlo">Agregar Sub Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">                        
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-12">
                        <div class="form-group mr-3">
                            <label>Nombre</label>
                            <input type="text" id="categoria_nombre" name="categoria_nombre" class="form-control" maxlength="99" required>
                            <label>Categoria</label>
                            <select id="categoria_id" name="categoria_id" class="form-control" required>
                            @foreach($categorias as $categoria)
                                @if($categoria->categoria_producto_id != 1)
                                <option value="{{ $categoria->categoria_producto_id}}">{{$categoria->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
            
                <div class="form-group pt-2">
                    <a class="btn btn-primary text-uppercase" href="javascript:agregarCategoria()">Guardar</a>
                </div>
          
        </div>
    </div>
    </div>
</div>
<div class="modal fade" id="marcaModal" tabindex="-1" role="dialog" aria-labelledby="marcaTitutlo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="marcaTitutlo">Agregar Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">                        
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="marca_nombre" name="marca_nombre" class="form-control" maxlength="99" required>
                        </div>
                    </div>
                </div>
            
                <div class="form-group pt-2">
                    <a class="btn btn-primary text-uppercase" href="javascript:agregarMarca()">Guardar</a>
                </div>
          
        </div>
    </div>
    </div>
</div>


<script>
    var productos_imagenes_json = [];
    var producto_tiempo_nombre = '{{ $producto_tiempo}}'
    function inicializar(){
        productos_imagenes_json = {!! $productos_imagenes_json !!};
    }
    window.onload = inicializar;
     function agregarCategoria(){
         if($('#categoria_nombre').val()==""){
            Swal.fire({
                type: "warning",
                title: "Complete los campos",
                text: "Por favor complete todos los campos para poder guardar su subcategoria.",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#2c5099", 
            });
         }else{
            Swal.fire({ title: "Guardando Sub Categoria", allowOutsideClick: false });
            Swal.showLoading();
            var token = '{{csrf_token()}}';
            var data = new FormData();
            data.append('_token',token);
            data.append('nombre',$('#categoria_nombre').val());
            data.append('id',$('#categoria_id').val());
            $.ajax({
                type: "post",
                url: "{{ route('sub_categorias_producto.storeProducto') }}",
                data: data,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (result) {
                    swal.close();
                    if(result.error){
                        Swal.fire({
                            type: "error",
                            title: "Ocurrio un error",
                            text: result.msg,
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#2c5099", 
                        });
                        $('#categoria_nombre').val(null);
                    }else{
                        Swal.fire({
                            type: 'success',
                            title: "Se ha guardado tu Sub categoria correctamente",
                            text: "Tu Sub categoria se a registrado correctamente!.",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#2c5099",
                        });
                        var select = document.getElementById('sub_categoria_producto_id');
                        var opt = document.createElement('option');
                        opt.value = result.id;
                        $('#categoriaModal').modal('hide');
                    opt.innerHTML = $('#categoria_nombre').val();
                    select.appendChild(opt);
                    $('#categoria_nombre').val(null);
                    $('#sub_categoria_producto_id').val(result.id);

                }
        
            }
        });
         }
     }

     function agregarMarca(){
         if($('#marca_nombre').val()==""){
            Swal.fire({
                type: "warning",
                title: "Complete los campos",
                text: "Por favor complete todos los campos para poder guardar su marca.",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#2c5099", 
            });
         }else{
            Swal.fire({ title: "Guardando Marca", allowOutsideClick: false });
            Swal.showLoading();
            var token = '{{csrf_token()}}';
            var data = new FormData();
            data.append('_token',token);
            data.append('nombre',$('#marca_nombre').val());
            $.ajax({
                type: "post",
                url: "{{ route('marcas_producto.storeProducto') }}",
                data: data,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (result) {
                    swal.close();
                    if(result.error){
                        Swal.fire({
                            type: "error",
                            title: "Ocurrio un error",
                            text: result.msg,
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#2c5099",   
                        });
                        $('#marca_nombre').val(null);
                    }else{
                        Swal.fire({
                            type: 'success',
                            title: "Se ha guardado tu marca correctamente",
                            text: "Tu marca se a registrado correctamente!.",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#2c5099",
                        });
                        var select = document.getElementById('marca_producto_id');
                        var opt = document.createElement('option');
                        opt.value = result.id;
                        $('#marcaModal').modal('hide');
                    opt.innerHTML = $('#marca_nombre').val();
                    select.appendChild(opt);
                    $('#marca_nombre').val(null);
                    $('#marca_producto_id').val(result.id);
                }
        
            }
        });
         }
     }

     function validarImagen(){
         if($('#inputGroupFile01').val()==''){
            Swal.fire({
                type: "warning",
                title: "No selecciono una imagen",
                text: "Por favor inserte su imagen para poder continuar.",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#2c5099", 
            });
         }else{
             if(productos_imagenes_json[parseInt($('#orden_imagen').val())-1]==null){
                $('#imagenModal').modal('hide');
             }else{
                Swal.fire({
                type: "warning",
                title: "El numero que selecciono ya se encuentra en uso",
                text: "Lo sentimos pero el producto "+productos_imagenes_json[parseInt($('#orden_imagen').val())-1].nombre+" ya se encuentra en esa posicion.",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#2c5099", 
            });
             }
            
         }
     }

     function cancelarImagen(){
        $("#preview1").attr("src", '{{ asset("assets/img/image-preview.jpg") }}');
        $("#inputGroupFile01").val('');
        $('#orden_imagen').val('1');
        $("#btn_edit_imagen").removeClass("fade-in");
        $("#btn_edit_imagen").addClass("fade-out");
        $("#btn_edit_imagen").addClass("d-none");
        $("#imagenCheck").prop("checked", false);
        $('#imagenModal').modal('hide');
     }

     function validarImagenInicio(){
         if($('#inputGroupFile02').val()==''){
            Swal.fire({
                type: "warning",
                title: "No selecciono una imagen",
                text: "Por favor inserte su imagen para poder continuar.",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#2c5099", 
            });
         }else{
            $('#imagenTiempoModal').modal('hide');
         }
     }

     function cancelarImagenInicio(){
        $("#preview2").attr("src", '{{ asset("assets/img/image-preview.jpg") }}');
        $("#inputGroupFile02").val('');
        $("#btn_edit_imagen_tiempo").removeClass("fade-in");
        $("#btn_edit_imagen_tiempo").addClass("fade-out");
        $("#btn_edit_imagen_tiempo").addClass("d-none");
        $("#imagenTiempoCheck").prop("checked", false);
        $('#imagenTiempoModal').modal('hide');
     }

     $('#estado_oferta').change(function () {
         if(this.value == 2){
            $("#tiempo_div").removeClass("d-none");
            $("#tiempo_div").removeClass("fade-out");
            $("#tiempo_div").addClass("fade-in");
            $("#imagen_tiempo_div").removeClass("d-none");
            $("#imagen_tiempo_div").removeClass("fade-out");
            $("#imagen_tiempo_div").addClass("fade-in");
            $('#tiempo').prop('required',true);
         }else{
            $("#tiempo_div").removeClass("fade-in");
            $("#tiempo_div").addClass("fade-out");
            $("#tiempo_div").addClass("d-none");
            $("#imagen_tiempo_div").removeClass("fade-in");
            $("#imagen_tiempo_div").addClass("fade-out");
            $("#imagen_tiempo_div").addClass("d-none");
            $('#tiempo').prop('required',false);
         }
        });
     function mostrarImagen(obj){
        if($(obj).is(":checked")){
            $('#imagenModal').modal('show');
            $("#btn_edit_imagen").removeClass("d-none");
            $("#btn_edit_imagen").removeClass("fade-out");
            $("#btn_edit_imagen").addClass("fade-in");

        }else{
            $("#btn_edit_imagen").removeClass("fade-in");
            $("#btn_edit_imagen").addClass("fade-out");
            $("#btn_edit_imagen").addClass("d-none");
        }
    }

    function mostrarImagenTiempo(obj){
        
        if($(obj).is(":checked")){
            if(producto_tiempo_nombre != ''){
                Swal.fire({
                type: "warning",
                title: "Ya tiene un producto mostrandose",
                text: "El producto "+producto_tiempo_nombre+' ya se esta mostrando en la pagina de inicio.',
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#2c5099", 
            });
            $('#imagenTiempoCheck').prop('checked', false);
            }else{
                $('#imagenTiempoModal').modal('show');
            $("#btn_edit_imagen_tiempo").removeClass("d-none");
            $("#btn_edit_imagen_tiempo").removeClass("fade-out");
            $("#btn_edit_imagen_tiempo").addClass("fade-in");
            }
            
        }else{
            $("#btn_edit_imagen_tiempo").removeClass("fade-in");
            $("#btn_edit_imagen_tiempo").addClass("fade-out");
            $("#btn_edit_imagen_tiempo").addClass("d-none");
        }
    }
</script>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/modernizr.js') }}"></script>
<script src="{{ asset('assets/js/image_preview.js') }}"></script>
@endsection