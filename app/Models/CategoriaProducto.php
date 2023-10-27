<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $table = 'categorias_producto';
    protected $primaryKey = 'categoria_producto_id';

    public function sub_categorias()
    {
        return $this->hasMany('App\Models\SubCategoriaProducto', 'categoria_producto_id');
    }
}
