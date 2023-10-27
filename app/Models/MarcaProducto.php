<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarcaProducto extends Model
{
    protected $table = 'marcas_producto';
    protected $primaryKey = 'marca_producto_id';

    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'marca_producto_id');
    }
}
