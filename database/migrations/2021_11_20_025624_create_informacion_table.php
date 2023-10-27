<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion', function (Blueprint $table) {
            $table->increments('informacion_id');
            $table->string('horario', 200);
            $table->string('whatsapp', 50);
            $table->string('correo', 200);
            $table->string('direccion', 400);
            $table->text('mapa');
            $table->text('url_whatsapp');
            $table->string('facebook', 200);
            $table->string('nosotros', 600);
            $table->decimal('costo_envio_principal', 6, 2);
            $table->decimal('costo_envio_secundario', 6, 2);
            $table->timestamps();
        });

        DB::connection('mysql')->table('informacion')->insert([
            [
                'horario' => 'De las HH am hasta las HH pm',
                'mapa' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.861479120773!2d-79.02621928539936!3d-8.115583594157702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3ddf28b9f40d%3A0x1d82e0bd4807b843!2sWos%20Telecomunicaciones!5e0!3m2!1ses!2spe!4v1643864757355!5m2!1ses!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'url_whatsapp' => 'https://wa.link/yqcfh5',
                'whatsapp' => '999999999',
                'correo' => 'correo@empresa.com',
                'direccion' => 'Direccion de la empresa',
                'facebook' => '/',
                'costo_envio_principal' => 0.00,
                'costo_envio_secundario' => 0.00,
                'nosotros' => 'Aqui va una breve descripcion de la empresa',
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
        Schema::dropIfExists('informacion');
    }
}
