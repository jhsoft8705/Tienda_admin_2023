<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrecioPorMayor extends Model
{
    protected $table = 'precios_por_mayor';
    protected $primaryKey = 'precio_por_mayor_id';

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id');
    }
}
