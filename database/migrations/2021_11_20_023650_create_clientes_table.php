<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('cliente_id');
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->string('documento', 100);
            $table->string('celular', 50)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->unsignedInteger('tipo_doc'); // 1: DNI, 2:CARNET
            $table->unsignedInteger('estado'); // 1:Activo, 0:Inactivo (BLOQUEAR UN USUARIO)
            $table->rememberToken();
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
        Schema::dropIfExists('clientes');
    }
}
