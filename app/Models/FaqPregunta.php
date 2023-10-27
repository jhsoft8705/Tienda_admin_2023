<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqPregunta extends Model
{
    protected $table = 'faq_preguntas';
    protected $primaryKey = 'faq_pregunta_id';

    public function seccion()
    {
        return $this->belongsTo('App\Models\FaqSeccion', 'faq_seccion_id');
    }
}
