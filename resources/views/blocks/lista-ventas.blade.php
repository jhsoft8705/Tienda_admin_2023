<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".datatable_custom_ventas").DataTable({
            oLanguage: {
                oPaginate: {
                    sPrevious: "Anterior",
                    sNext: "Siguiente"
                },
                sInfo: "Mostrando página _PAGE_ de _PAGES_",
                sSearch: "",
                sSearchPlaceholder: "Buscar",
                sLengthMenu: "Mostrar _MENU_ resultados",
            },
            stripeClasses: [],
            order: [
                [0, "desc"]
            ],
            lengthMenu: [10, 25, 50, 100],
            pageLength: 10,
        });
    });
</script>
<div class="table-responsive">
    <table class="table table-striped datatable_custom_ventas">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cliente</th>
                <th>Distrito - Provincia</th>
                <th>Subtotal</th>
                <th>Total</th>
                <th>Metodo de Pago</th>
                <th>DNI</th>
                <th>Direccion</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->venta_id }}</td>
                    <td>{{ $venta->celular }} - <span class="text-uppercase">{{ $venta->nombres_apellidos }}</span>
                    </td>
                    @if ($venta->tipo == 0)
                        <td>{{ $venta->provincia_distrito->departamento->nombre . ' - ' . $venta->provincia_distrito->nombre }}
                        </td>
                    @else
                        <td>Entrega en Tienda</td>
                    @endif

                    <td>S/. {{ $venta->subtotal }}</td>
                    <td>S/. {{ $venta->total }}</td>
                    <td>{{ $venta->metodo_pago->nombre }}</td>
                    <td>{{ $venta->documento }}</td>
                    <td>{{ !$venta->direccion ? 'Recojo en Tienda' : $venta->direccion }}</td>
                    <td class="text-center">
                        @if ($venta->estado == 1)
                            <div class="badge badge-success">Completada</div>
                        @elseif($venta->estado == 0)
                            <div class="badge badge-warning">Pendiente</div>
                        @elseif($venta->estado == 2)
                            <div class="badge badge-danger">Cancelada</div>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ config('variables.directorios.pagos') . $venta->venta_id . '/' . $venta->pago_doc }}"
                            target="_blank" class="text-warning" data-toggle="tooltip" title="Ver Pago">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                <path
                                    d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z" />
                            </svg>
                        </a>
                        <a href="{{ '#ventaModal' . $venta->venta_id }}"
                            data-target="{{ '#ventaModal' . $venta->venta_id }}" data-toggle="modal"
                            class="text-info" title="Ver Detalles">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg> </a>
                        @if ($venta->estado == 0)
                            <a href="javascript:LiquidarVenta({{ $venta->venta_id }})" class="text-success"
                                data-toggle="tooltip" title="Marcar como exitosa Venta">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                </svg>
                            </a>
                            <a href="#observacion{{ $venta->venta_id }}"
                                data-target="#observacion{{ $venta->venta_id }}" data-toggle="modal"
                                class="text-danger" data-toggle="tooltip" title="Marcar como cancelada Venta">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                                </svg>
                            </a>
                        @endif
                        @if ($venta->estado == 2 && $venta->observacion)
                            <a href="#observacion_ver{{ $venta->venta_id }}"
                                data-target="#observacion_ver{{ $venta->venta_id }}" data-toggle="modal"
                                class="text-info" data-toggle="tooltip" title="Ver Observacion">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </a>
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

@foreach ($ventas as $venta)
    <div class="modal fade" id="ventaModal{{ $venta->venta_id }}" tabindex="-1" role="dialog"
        aria-labelledby="ventaTitutlo{{ $venta->venta_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ventaTitutlo{{ $venta->venta_id }}">Detalles de la Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="table-responsive">
                        <table class="table table-striped datatable_custom">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Color</th>
                                    <th>Talla</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($venta->detalles as $detalle)
                                    <tr>
                                        <td>{{ $detalle->producto->nombre }}</td>
                                        <td>{{ $detalle->color }}</td>
                                        <td>{{ $detalle->talla }}</td>
                                        <td>{{ $detalle->cantidad }} productos</td>
                                        <td>S/. {{ $detalle->precio }}</td>
                                        <td>S/. {{ $detalle->cantidad * $detalle->precio }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @if ($venta->estado == 0)
        <div class="modal fade" id="observacion{{ $venta->venta_id }}" tabindex="-1" role="dialog"
            aria-labelledby="ventaTitutlo{{ $venta->venta_id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ventaTitutlo{{ $venta->venta_id }}">Cancelar Venta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="row no-gutters align-items-center mx-5 w-100">
                            <div class="col-sm-12">
                                <div class="form-group mr-3">
                                    <label>Observacion:</label>
                                    <input type="text" id="observacion_{{ $venta->venta_id }}" class="form-control"
                                        maxlength="99" required>
                                </div>
                            </div>
                            <div class="col text-right mt-3">
                                <a href="javascript:cancelarVenta({{ $venta->venta_id }})"
                                    class="w-100 button-icon-s principal"><span class="material-icons">
                                        save
                                    </span>Guardar</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif

    @if ($venta->estado == 2 && $venta->observacion)
        <div class="modal fade" id="observacion_ver{{ $venta->venta_id }}" tabindex="-1" role="dialog"
            aria-labelledby="ventaTitutlo{{ $venta->venta_id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Observacion de Venta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="row no-gutters align-items-center mx-3 w-100">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p>{{ $venta->observacion }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
@endforeach
