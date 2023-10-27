<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'venta_id';

    public function detalles()
    {
        return $this->hasMany('App\Models\DetalleVenta', 'venta_id');
    }
    public function provincia_distrito()
    {
        return $this->belongsTo('App\Models\ProvinciaDistrito', 'provincia_distrito_id');
    }
    public function metodo_pago()
    {
        return $this->belongsTo('App\Models\MetodoPago', 'metodo_de_pago_id');
    }
}
