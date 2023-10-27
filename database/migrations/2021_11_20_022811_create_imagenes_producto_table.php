<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_producto', function (Blueprint $table) {
            $table->increments('imagen_producto_id');
            $table->string('imagen', 100);
            $table->integer('color_producto_id')->unsigned();
            $table->timestamps();
            $table->foreign('color_producto_id')->references('color_producto_id')->on('colores_producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_producto');
    }
}
