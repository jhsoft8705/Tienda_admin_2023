<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosPorMayorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_por_mayor', function (Blueprint $table) {
            $table->increments('precio_por_mayor_id');
            $table->unsignedInteger('cantidad');
            $table->decimal('precio', 6, 2);
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
            $table->foreign('producto_id')->references('producto_id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precios_por_mayor');
    }
}
