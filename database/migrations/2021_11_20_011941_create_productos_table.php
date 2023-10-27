<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('producto_id');
            $table->decimal('precio', 6, 2);
            $table->decimal('precio_oferta', 6, 2);
            $table->unsignedInteger('estado_stock');
            $table->string('nombre', 100);
            $table->string('descripcion', 600)->nullable();
            $table->unsignedInteger('estado');
            $table->integer('sub_categoria_producto_id')->unsigned();
            $table->string('codigo', 50)->unique();
            $table->string('material', 100);
            $table->unsignedInteger('estado_oferta'); //0:desactivado, 1:activado, 2:activado-tiempo
            $table->unsignedInteger('order_imagen')->nullable(); //1-7 imagenes en el banner png
            $table->string('tiempo_oferta', 100)->nullable(); //Solo necesario cuando sea el estado 2
            $table->unsignedInteger('estado_mostrar_inicio');
            $table->unsignedInteger('estado_mostrar_inicio_oferta');
            $table->string('imagen_inicio_oferta', 100)->nullable(); //Imagen en PNG para mostrar al incio(solo cuando el estado es 1)
            $table->string('imagen_inicio', 100)->nullable(); //Imagen en PNG para mostrar al incio(solo cuando el estado es 1)
            $table->integer('marca_producto_id')->unsigned();
            $table->timestamps();
            $table->foreign('marca_producto_id')->references('marca_producto_id')->on('marcas_producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
