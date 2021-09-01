<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('nombre',50);
            $table->string('app',50);
            $table->string('apm',50);
            $table->string('correo',50);
            $table->string('telefono',10);
            $table->string('calle',50);
            $table->string('colonia',50);
            $table->string('num_e',10);
            $table->string('num_i',10);
            $table->string('cp',10);
            $table->string('genero',50);
            $table->string('municipio',50);
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
        Schema::dropIfExists('clientes');
    }
}
