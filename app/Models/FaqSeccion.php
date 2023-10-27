<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqSeccion extends Model
{
    protected $table = 'faq_secciones';
    protected $primaryKey = 'faq_seccion_id';

    public function preguntas()
    {
        return $this->hasMany('App\Models\FaqPregunta', 'faq_seccion_id');
    }
}
