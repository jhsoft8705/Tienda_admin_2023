<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextoGuiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texto_guia', function (Blueprint $table) {
            $table->increments('texto_guia_id');
            $table->string('texto_principal', 200);
            $table->string('texto_secundario', 200);
            $table->string('icono', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('texto_guia');
    }
}
