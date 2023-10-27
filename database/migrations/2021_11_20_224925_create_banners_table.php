<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('banner_id');
            $table->string('imagen', 400)->nullable();
            $table->string('link_boton', 200)->nullable();
            $table->string('link_imagen', 200)->nullable();
            $table->unsignedInteger('estado_hover');
            $table->string('texto_1', 100)->nullable();
            $table->string('texto_2', 100)->nullable();
            $table->string('texto_3', 100)->nullable();
            $table->string('texto_boton', 100)->nullable();
            $table->timestamps();
        });

        DB::connection('mysql')->table('banners')->insert([
            [
                'link_boton' => null,
                'imagen' => 'banner-1.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => 'TEMPORADA VERANO',
                'texto_2' => 'marcas mas vendidas',
                'texto_3' => '70%',
                'texto_boton' => null,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'link_imagen' => 'inicio.index',
                'imagen' => 'banner-2.jpg',
                'estado_hover' => 0,
                'texto_1' => 'Ropa interior adaptada',
                'texto_2' => 'Para cualquier ocasion',
                'texto_3' => null,
                'texto_boton' => 'VER AHORA',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'imagen' => 'banner-3.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => 'Nueva colección',
                'texto_2' => 'MUJERES',
                'texto_3' => null,
                'texto_boton' => 'VER MÁS',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'imagen' => 'banner-4.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 1,
                'texto_1' => 'TEMPORADA VERANO',
                'texto_2' => 'Coleccion Verano',
                'texto_3' => '-5% Menos',
                'texto_boton' => 'COMPRAR AHORA',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'imagen' => 'banner-5.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 1,
                'texto_1' => 'Viste bien a donde quiera que vayas',
                'texto_2' => null,
                'texto_3' => null,
                'texto_boton' => 'COMPRAR AHORA',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'imagen' => 'banner-6.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => '15 % MENOS',
                'texto_2' => 'INTERIOR BASICO',
                'texto_3' => null,
                'texto_boton' => 'COMPRAR AHORA',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'imagen' => 'banner-7.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => 'COLLECCION 2021',
                'texto_2' => 'Vistete con lo ultimo',
                'texto_3' => null,
                'texto_boton' => 'COMPRAR AHORA!',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'imagen' => 'banner-8.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => 'NUEVOS ESTILOS',
                'texto_2' => 'Nueva Coleccion',
                'texto_3' => null,
                'texto_boton' => 'COMPRAR AHORA',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'imagen' => 'banner-9.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => '40% GRATIS',
                'texto_2' => null,
                'texto_3' => null,
                'texto_boton' => 'COMPRAR AHORA',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => 'inicio.index',
                'imagen' => 'banner-10.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => 'Las mejores',
                'texto_2' => 'marcas a LOS PRECIOS MAS BAJOS',
                'texto_3' => null,
                'texto_boton' => 'COMPRAR AHORA!',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => null,
                'imagen' => 'banner-11.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => '- 70%',
                'texto_2' => 'COLECCION VERANO',
                'texto_3' => null,
                'texto_boton' => null,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ],
            [
                'link_boton' => null,
                'imagen' => 'banner-12.jpg',
                'link_imagen' => 'inicio.index',
                'estado_hover' => 0,
                'texto_1' => 'FUERTES E INSPIRADORAS',
                'texto_2' => null,
                'texto_3' => null,
                'texto_boton' => null,
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
        Schema::dropIfExists('banners');
    }
}
