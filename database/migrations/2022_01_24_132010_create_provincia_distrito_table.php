<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciaDistritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias_distritos', function (Blueprint $table) {
            $table->increments('provincia_distrito_id');
            $table->string('nombre', 100);
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('estado');
            $table->timestamps();
            $table->foreign('departamento_id')->references('departamento_id')->on('departamentos');
        });

        Schema::table('ventas', function (Blueprint $table) {
            $table->foreign('provincia_distrito_id')->references('provincia_distrito_id')->on('provincias_distritos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincia_distrito');
    }
}
