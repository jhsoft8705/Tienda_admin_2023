<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_venta', function (Blueprint $table) {
            $table->increments('detalle_venta_id');
            $table->integer('venta_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->decimal('precio', 6, 2);
            $table->unsignedInteger('cantidad');
            $table->string('talla', 50);
            $table->string('color', 50);
            $table->timestamps();
            $table->foreign('venta_id')->references('venta_id')->on('ventas');
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
        Schema::dropIfExists('detalles_venta');
    }
}
