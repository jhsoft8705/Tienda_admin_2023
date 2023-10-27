<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallasProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallas_producto', function (Blueprint $table) {
            $table->increments('talla_producto_id');
            $table->string('talla', 100);
            $table->integer('color_producto_id')->unsigned();
            $table->unsignedInteger('estado_stock');
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
        Schema::dropIfExists('tallas_producto');
    }
}
