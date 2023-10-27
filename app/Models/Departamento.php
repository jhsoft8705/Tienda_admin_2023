<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'departamento_id';

    public function provincias()
    {
        return $this->hasMany('App\Models\ProvinciaDistrito', 'departamento_id');
    }
}
