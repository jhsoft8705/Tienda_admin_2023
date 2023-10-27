@extends('layouts.app')

@section('content')
<section class="section">
    <ul class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item">
            <h4 class="page-title">Categorias Productos</h4>
        </li>
    </ul>
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center w-100">
                            <div class="col-sm-6">
                                <h4>Editar Categoria</h4>
                            </div>
                            <div class="col-sm-6 text-right justify-content-end d-flex">
                                <a href="{{ route('productos.index') }}"class="btn btn-light text-uppercase rounded-0">Volver</a>
                            </div>
                        </div>                       
                    </div>                
                    <div class="card-body">
                        <!-- f -->
                        
                        <form method="POST" action="{{ route('categorias_producto.update') }}" class="needs-validation" novalidate enctype="multipart/form-data">
                      
                          
                            <div class="row no-gutters align-items-center">
                                <div class="col-sm-3">
                                    <div class="form-group mr-3">
                                        <label>Imagen (*Opcional)</label>
                                        <div id='img_container'><img id="preview" src="{{ url('/categorias/' . (($categoria_producto->imagen) ? $categoria_producto->imagen : 'image-preview.jpg')) }}" alt="your image" title=''/></div> 
                                            <div class="input-group"> 
                                            <div class="custom-file files form-group">
                                            <input type="file" id="inputGroupFile01" name="image"  aria-describedby="inputGroupFileAddon01">
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group mr-3">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" value="{{ $categoria_producto->nombre }}" class="form-control" maxlength="99" required>
                                        <div class="invalid-feedback">Por favor ingrese un nombre valido</div>
                                        @if($errors->has('nombre'))
                                        <div class="invalid-message-feedback">{{ $errors->first('nombre') }}</div>
                                        @endif
                                        <label>Estado</label>
                                        <select name="estado" class="form-control" required>
                                            <option value="1" {{ $categoria_producto->estado == 1 ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ $categoria_producto->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                        <label>Tipo</label>
                                        <select name="tipo" class="form-control" required>
                                            <option value="0" {{ $categoria_producto->tipo == 0 ? 'selected' : ''}}>Dama</option>
                                            <option value="1" {{ $categoria_producto->tipo == 1 ? 'selected' : ''}}>Varon</option>
                                            <option value="2" {{ $categoria_producto->tipo == 2 ? 'selected' : ''}}>Niños</option>
                                            <option value="3" {{ $categoria_producto->tipo == 3 ? 'selected' : ''}}>Otros</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group pt-2">
                                {{ csrf_field() }}
                                <input type="hidden" name="categoria_producto_id" value="{{ $categoria_producto->categoria_producto_id }}" readonly/>
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