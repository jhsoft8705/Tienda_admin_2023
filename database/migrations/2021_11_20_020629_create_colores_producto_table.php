<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColoresProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colores_producto', function (Blueprint $table) {
            $table->increments('color_producto_id');
            $table->string('nombre', 100);
            $table->string('codigo_color', 100);
            $table->integer('producto_id')->unsigned();
            $table->unsignedInteger('estado_stock');
            $table->unsignedInteger('estado_principal');
            $table->timestamps();
            $table->foreign('producto_id')->references('producto_id')->on('productos');
        });
        Schema::table('tallas_producto', function ($table) {
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
        Schema::dropIfExists('colores_producto');
    }
}
