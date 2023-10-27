<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_producto', function (Blueprint $table) {
            $table->increments('categoria_producto_id');
            $table->string('nombre', 50);
            $table->string('imagen', 100)->nullable();
            $table->unsignedInteger('tipo'); //0: MUJER, 1: HOMBRE, 2:NIÑOS, 3:OTROS
            $table->unsignedInteger('estado');
            $table->timestamps();
        });

        DB::connection('mysql')->table('categorias_producto')->insert([
            [
                'nombre' => 'Sin Categoria',
                'imagen' => 'sin_categoria.png',
                'estado' => 1,
                'tipo' => 3,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_producto');
    }
}
