<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'producto_id';

    public function marca()
    {
        return $this->belongsTo('App\Models\MarcaProducto', 'marca_producto_id');
    }
    public function subcategoria()
    {
        return $this->belongsTo('App\Models\SubCategoriaProducto', 'sub_categoria_producto_id');
    }
    public function colores()
    {
        return $this->hasMany('App\Models\ColorProducto', 'producto_id');
    }
    public function precios_por_mayor()
    {
        return $this->hasMany('App\Models\PrecioPorMayor', 'producto_id');
    }
    public function detalles_venta()
    {
        return $this->hasMany('App\Models\DetalleVenta', 'producto_id');
    }
}
