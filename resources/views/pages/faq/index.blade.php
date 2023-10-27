@extends('layouts.app')
@section('style')
<link href="{{ asset('assets/banner-editor/fonts/icomoon-reg/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<section class="section">
    <div class="fab-container">
      <div class="fab fab-icon-holder">
        <span class="material-icons">add</span>
      </div>
      <ul class="fab-options">
        <li>
          <span class="fab-label">Nueva Seccion</span>
          <a class="fab-icon-holder text-decoration-none" href="{{route('faq.create_seccion')}}">
            <span class="material-icons">list</span>
          </a>
        </li>

        
      </ul>
    </div>
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card bg-light">
                    <div class="card-body mt-5">
                            <div class="title center">
                            <h1 class="size-lg align-center">PREGUNTAS FRECUENTES</h1>
                            @foreach($secciones as $seccion)
                            <h2 class="no-line custom-color size-lg mb-10">{{ $seccion->nombre }}<a data-toggle="tooltip" data-original-title="Editar Nombre Seccion" class="btn_edit" href="{{ route('faq.edit_seccion', ['id' => $seccion->faq_seccion_id]) }}"><span class="material-icons">
                                edit
                                </span></a><a data-toggle="tooltip" data-original-title="Agregar Pregunta" class="btn_edit" href="{{ route('faq.create_pregunta', ['id' => $seccion->faq_seccion_id]) }}"><span class="ml-0 material-icons">
                                    add
                                    </span></a><a data-toggle="tooltip" data-original-title="Eliminar Seccion" class="btn_edit" href="javascript:eliminarSeccion({{$seccion->faq_seccion_id}})"><span class="ml-0 material-icons">
                                        delete
                                        </span></a></h2>
                            <div class="panel-group faq" id="{{ 'seccion' . $seccion->faq_seccion_id }}">
                                @foreach($seccion->preguntas as $pregunta)
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#{{ 'seccion' . $seccion->faq_seccion_id }}" href="#{{ 'seccion' . $seccion->faq_seccion_id . $pregunta->faq_pregunta_id}}" class="collapsed" aria-expanded="false">
                                            <span class="closed iconos"><i>–</i></span>
                                            <span class="opened iconos"><i>+</i></span>
                                            <div class="panel-title">{{ $pregunta->pregunta }}</div>
                                            <a href="{{ route('faq.edit_pregunta', ['id' => $pregunta->faq_pregunta_id]) }}" class="btn_edit_question btn_delete_question"><span class="material-icons">edit</span></a>     
                                            <a href="javascript:eliminarPregunta({{$pregunta->faq_pregunta_id}})" class="btn_edit_question"><span class="material-icons">delete</span></a>                                  
                                        </a>
                                    </div>
                                    <div id="{{ 'seccion' . $seccion->faq_seccion_id . $pregunta->faq_pregunta_id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body text-dark-all">
                                            <p>{{ $pregunta->respuesta }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                    
                            </div>
                            @endforeach
                      
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function eliminarSeccion(id){
            Swal.fire({
                type: 'warning',
                title: '¿Esta seguro que desea eliminar esta seccion?',
                text: "Una vez elimnado no podras recuperar los datos de esta seccion",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
              if (result.value) {
                Swal.fire({ title: "Elimnando Seccion", allowOutsideClick: false });
                Swal.showLoading();
                var token = '{{csrf_token()}}';
                var data={id:id,_token:token};
                $.ajax({
                type: "post",
                url: "{{ route('faq.delete_seccion') }}",
                data: data,
                success: function (result) {
                    swal.close();
                    if(result.error){
                        Swal.fire({
                            type: "error",
                            title: "Ocurrio un error",
                            text: "Lo sentimos pero no pudimos eliminar esta seccion, por favor intentelo mas tarde.",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#2c5099", 
                        });
                    }else{
                        Swal.fire({
                            type: 'success',
                            title: "Se ha eliminado tu seccion correctamente",
                            text: "Tu Seccion se ha eliminado correctamente!.",
                            footer:`<a style="background-color: #2c5099;
                            border-left-color: #2c5099;
                            border-right-color: #2c5099;" 
                            class="swal2-confirm swal2-styled" href="{{ route('faq.index') }}">Continuar</a>`,
                            showConfirmButton: false,
                            allowOutsideClick: false 
                        });
                    }
                }
                });
              };
            });
    }
    function eliminarPregunta(id){
            Swal.fire({
                type: 'warning',
                title: '¿Esta seguro que desea eliminar esta pregunta?',
                text: "Una vez elimnado no podras recuperar los datos de esta pregunta",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
              if (result.value) {
                Swal.fire({ title: "Elimnando Pregunta", allowOutsideClick: false });
                Swal.showLoading();
                var token = '{{csrf_token()}}';
                var data={id:id,_token:token};
                $.ajax({
                type: "post",
                url: "{{ route('faq.delete_pregunta') }}",
                data: data,
                success: function (result) {
                    swal.close();
                    if(result.error){
                        Swal.fire({
                            type: "error",
                            title: "Ocurrio un error",
                            text: "Lo sentimos pero no pudimos eliminar esta pregunta, por favor intentelo mas tarde.",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#2c5099", 
                        });
                    }else{
                        Swal.fire({
                            type: 'success',
                            title: "Se ha eliminado tu pregunta correctamente",
                            text: "Tu Pregunta se ha eliminado correctamente!.",
                            footer:`<a style="background-color: #2c5099;
                            border-left-color: #2c5099;
                            border-right-color: #2c5099;" 
                            class="swal2-confirm swal2-styled" href="{{ route('faq.index') }}">Continuar</a>`,
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