<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorProducto extends Model
{
    protected $table = 'colores_producto';
    protected $primaryKey = 'color_producto_id';

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id');
    }
    public function imagenes()
    {
        return $this->hasMany('App\Models\ImagenProducto', 'color_producto_id');
    }
    public function tallas()
    {
        return $this->hasMany('App\Models\TallaProducto', 'color_producto_id');
    }
}
