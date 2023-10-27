@extends('layouts.app')

@section('content')
<section class="section">
    <ul class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item">
            <h4 class="page-title">Usuarios</h4>
        </li>
    </ul>
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center w-100">
                            <div class="col-sm-6">
                                <h4>Listado de Usuarios</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('users.create') }}"class="py-2 btn btn-primary text-uppercase rounded w-100 btn-ventas"> <i class="material-icons mr-2" style="font-weight: 900; font-size: xx-large;">add_circle_outline</i>Nuevo Usuario</a>                      
                            </div> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Apellidos y Nombres</th>
                                        <th>Correo electrónico</th>
                                        <th>Teléfono</th>
                                        <th class="text-center">Tipo de Usuario</td>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if($user->user_id != Auth::user()->user_id)
                                    <tr>
                                        <td><span class="text-uppercase">{{ $user->nombre }} {{ $user->apellidos }}</span></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->celular }}</td>
                                        <td class="text-center">
                                            @if($user->tipo_usuario == 1)
                                            <div>Administrador</div>
                                            @elseif($user->tipo_usuario == 2)
                                            <div>Vendedor</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->estado == 1)
                                            <div class="badge badge-success">Activo</div>
                                            @elseif($user->estado == 0)
                                            <div class="badge badge-danger">Inactivo</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('users.edit', ['id' => $user->user_id]) }}" class="text-info" data-toggle="tooltip" title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>

                                        </td>
                                    </tr>
                                    @endif
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
@endsection
