<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    protected $table = 'imagenes_producto';
    protected $primaryKey = 'imagen_producto_id';

    public function color()
    {
        return $this->belongsTo('App\Models\ColorProducto', 'color_producto_id');
    }
}
