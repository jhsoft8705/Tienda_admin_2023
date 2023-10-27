<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    protected $table = 'metodos_de_pago';
    protected $primaryKey = 'metodo_de_pago_id';

    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'metodo_de_pago_id');
    }
}
