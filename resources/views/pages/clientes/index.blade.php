@extends('layouts.app')

@section('content')
<section class="section">
    <ul class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item">
            <h4 class="page-title">Clientes</h4>
        </li>
    </ul>
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center w-100">
                            <div class="col-sm-12">
                                <h4>Listado de Clientes</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Nombres y Apellidos</th>
                                        <th>Documento</th>
                                        <th>Celular</th>
                                        <th>Correo electrónico</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clientes as $cliente)
                                    <tr>
                                        <td><span class="text-uppercase">{{ $cliente->nombre }} {{ $cliente->apellidos }}</span></td>
                                        <td>{{ $cliente->documento . ' - ' . ($cliente->tipo_doc == 1 ? 'DNI' : 'RUC') }}</td>
                                        <td>{{ $cliente->celular }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td class="text-center">
                                            @if($cliente->estado == 1)
                                            <div class="badge badge-success">Activo</div>
                                            @elseif($cliente->estado == 0)
                                            <div class="badge badge-danger">Inactivo</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:deshabilitar({{$cliente->cliente_id}},true)" class="text-danger" data-toggle="tooltip" title="Deshabilitar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cloud-slash-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M3.112 5.112a3.125 3.125 0 0 0-.17.613C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13H11L3.112 5.112zm11.372 7.372L4.937 2.937A5.512 5.512 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773a3.2 3.2 0 0 1-1.516 2.711zm-.838 1.87-12-12 .708-.708 12 12-.707.707z"/>
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
    </div>
</section>
<script>
          function deshabilitar(id){
        Swal.fire({
                type: 'warning',
                title: '¿Esta seguro que desea deshabilitar este Cliente?',
                text: "Una vez deshabilitado no podra ingresar a su cuenta.",
                showCancelButton: true,
                confirmButtonText: 'Deshabilitar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
              if (result.value) {
                Swal.fire({ title: "Deshabilitando cliente", allowOutsideClick: false });
                Swal.showLoading();
                var token = '{{csrf_token()}}';
                var data={id:id,_token:token};
                $.ajax({
                type: "post",
                url: "{{ route('clientes.deshabilitar') }}" ,
                data: data,
                success: function (result) {
                    swal.close();
                    if(result.error){
                        Swal.fire({
                            type: "error",
                            title: "Ocurrio un error",
                            text: "Lo sentimos pero no pudimos deshabilitar este cliente, por favor intentelo mas tarde.",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#2c5099", 
                        });
                    }else{
                        Swal.fire({
                            type: 'success',
                            title: "Se ha deshabilitado tu cliente correctamente",
                            text: "Tu cliente se ha deshabilitado correctamente!.",
                            footer:`<a style="background-color: #2c5099;
                            border-left-color: #2c5099;
                            border-right-color: #2c5099;" 
                            class="swal2-confirm swal2-styled" href="{{ route('clientes.index') }}">Continuar</a>`,
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