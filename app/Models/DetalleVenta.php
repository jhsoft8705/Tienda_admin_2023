<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalles_venta';
    protected $primaryKey = 'detalle_venta_id';

    public function venta()
    {
        return $this->belongsTo('App\Models\Venta', 'venta_id');
    }
    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id');
    }
}
