<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinciaDistrito extends Model
{
    protected $table = 'provincias_distritos';
    protected $primaryKey = 'provincia_distrito_id';

    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'provincia_distrito_id');
    }

    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento', 'departamento_id');
    }
}
