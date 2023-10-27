<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia', function (Blueprint $table) {
            $table->increments('guia_id');
            $table->string('video_guia', 200);
            $table->string('imagen_guia', 200);
            $table->timestamps();
        });
        DB::connection('mysql')->table('guia')->insert([
            [
                'video_guia' => 'guia.mp4',
                'imagen_guia' => 'guia.jpg',
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
        Schema::dropIfExists('guia');
    }
}
