<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
                $table->increments('idtranspor');
                $table->string('nombre',30);
                $table->string('app',10);
                $table->string('apm',10);
                $table->string('telefono',10);
                $table->string('calle',50);
                $table->string('colonia',50);
                $table->string('marca',20);
                $table->string('placas',9);
                $table->string('color',20);
                $table->string('modelo',20);
                $table->string('agencia',20);
                $table->string('tpc');
                $table->string('tps');
                $table->enum('seguro',['si','no']);
                $table->enum('alarma',['si','no','clasica']);
                $table->string('img',255)->nullable();
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
        Schema::dropIfExists('transportes');
    }
}
