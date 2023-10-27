<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoMostrar extends Model
{
    protected $table = 'productos_mostrar';
    protected $primaryKey = 'producto_mostrar_id';

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id');
    }
}
