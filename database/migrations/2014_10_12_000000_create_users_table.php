<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->string('celular', 50)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('device_token', 200)->nullable();
            $table->rememberToken();
            $table->unsignedInteger('tipo_usuario'); // 1: Administrador, 2:Vendedor
            $table->unsignedInteger('estado'); // 1:Activo, 0:Inactivo
            $table->timestamps();
        });

        DB::connection('mysql')->table('users')->insert([
            [
                'nombre' => 'Usuario',
                'apellidos' => 'General',
                'tipo_usuario' => '1',
                'email' => 'admin@deyabu.com',
                'password' => Hash::make('@wos1234'),
                'celular' => '999999999',
                'estado' => 1,
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
        Schema::dropIfExists('users');
    }
}
