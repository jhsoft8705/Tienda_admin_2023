<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoriaProducto extends Model
{
    protected $table = 'sub_categorias_producto';
    protected $primaryKey = 'sub_categoria_producto_id';
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'sub_categoria_producto_id');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Models\CategoriaProducto', 'categoria_producto_id');
    }
}
