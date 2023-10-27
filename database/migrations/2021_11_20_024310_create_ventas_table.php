<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('venta_id');
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('provincia_distrito_id')->unsigned()->nullable();
            $table->integer('metodo_de_pago_id')->unsigned();
            $table->unsignedInteger('tipo'); //0: Entrega a domicilio, 1: Recogo en tienda
            $table->string('nombres_apellidos', 200);
            $table->string('documento', 50)->nullable(); //OPCIONAL SI PIDE COMPROBANTE
            $table->string('celular', 200);
            $table->string('direccion', 600)->nullable(); //OPCIONAL SI PIDE DELIVERY
            $table->string('fecha_hora', 100)->nullable();
            $table->decimal('subtotal', 6, 2);
            $table->decimal('costo_envio', 6, 2);
            $table->decimal('total', 6, 2);
            $table->string('pago_doc', 400);
            $table->string('observacion', 600)->nullable(); //OPCIONAL SI SE CANCELA LA VENTA
            $table->unsignedInteger('estado')->nullable(); //0: No realizada, 1: Realizada, 2: Cancelada
            $table->timestamps();
            $table->foreign('cliente_id')->references('cliente_id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
