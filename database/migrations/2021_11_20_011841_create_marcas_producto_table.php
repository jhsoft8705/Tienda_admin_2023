<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcasProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas_producto', function (Blueprint $table) {
            $table->increments('marca_producto_id');
            $table->string('nombre', 50);
            $table->timestamps();
        });

        DB::connection('mysql')->table('marcas_producto')->insert([
            [
                'nombre' => 'Sin Marca',
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
        Schema::dropIfExists('marcas_producto');
    }
}
