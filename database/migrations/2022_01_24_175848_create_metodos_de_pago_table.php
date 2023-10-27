<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodosDePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodos_de_pago', function (Blueprint $table) {
            $table->increments('metodo_de_pago_id');
            $table->string('nombre', 100);
            $table->string('nro_abono', 100);
            $table->unsignedInteger('estado');
            $table->string('imagen', 200)->nullable();
            $table->timestamps();
        });
        Schema::table('ventas', function (Blueprint $table) {
            $table->foreign('metodo_de_pago_id')->references('metodo_de_pago_id')->on('metodos_de_pago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metodos_de_pago');
    }
}
