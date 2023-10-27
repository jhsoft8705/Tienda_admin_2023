<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TallaProducto extends Model
{
    protected $table = 'tallas_producto';
    protected $primaryKey = 'talla_producto_id';

    public function color_producto()
    {
        return $this->belongsTo('App\Models\ColorProducto', 'color_producto_id');
    }
}
