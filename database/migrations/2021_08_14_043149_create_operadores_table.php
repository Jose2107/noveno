<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operadores', function (Blueprint $table) {
            $table->increments('idoperador');
            $table->string('nombre',50);
            $table->string('apellidop',40);
            $table->string('apellidom',40);
            $table->string('genero',10);
            $table->string('email',70);
            $table->string('telefono',13);
            $table->string('calle',40);
            $table->string('colonia',40);
            $table->string('noexterior',20);
            $table->string('nointerior',20);
            $table->string('cp',7);
            $table->string('maneja',2);
            $table->string('conduce',30);
            $table->string('foto',150);
            $table->integer('idmunicipio')->unsigned();
            $table->foreign('idmunicipio')->references('idmunicipio')->on('municipios');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('operadores');
    }
}
