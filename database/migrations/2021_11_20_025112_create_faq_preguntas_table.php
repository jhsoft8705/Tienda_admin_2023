<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_preguntas', function (Blueprint $table) {
            $table->increments('faq_pregunta_id');
            $table->integer('faq_seccion_id')->unsigned();
            $table->string('pregunta', 600);
            $table->string('respuesta', 600);
            $table->timestamps();
            $table->foreign('faq_seccion_id')->references('faq_seccion_id')->on('faq_secciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_preguntas');
    }
}
