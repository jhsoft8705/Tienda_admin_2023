<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriasProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categorias_producto', function (Blueprint $table) {
            $table->increments('sub_categoria_producto_id');
            $table->string('nombre', 50);
            $table->unsignedInteger('estado');
            $table->integer('categoria_producto_id')->unsigned();
            $table->timestamps();
            $table->foreign('categoria_producto_id')->references('categoria_producto_id')->on('categorias_producto');
        });
        Schema::table('productos', function (Blueprint $table) {
            $table->foreign('sub_categoria_producto_id')->references('sub_categoria_producto_id')->on('sub_categorias_producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categorias_producto');
    }
}
