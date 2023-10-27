@foreach($ventas as $venta)
<div class="modal fade" id="ventaModal{{$venta->venta_id}}" tabindex="-1" role="dialog" aria-labelledby="ventaTitutlo{{$venta->venta_id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="ventaTitutlo{{$venta->venta_id}}">Detalles de la Venta</h5>
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
                        @foreach($venta->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->color }}</td>
                            <td>{{ $detalle->talla }}</td>
                            <td>{{ $detalle->cantidad }} productos</td>
                            <td>S/. {{ $detalle->precio }}</td>
                            <td>S/. {{ $detalle->cantidad*$detalle->precio }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
   
    </div>
    </div>
</div>
@endforeach