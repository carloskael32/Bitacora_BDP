<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();

            $table->string('Agencia');
            $table->string('EncargadoOP');
            $table->float('Temperatura');
            $table->float('Humedad');
            $table->string('Filtracion');
            $table->string('UPS');
            $table->text('Generador');
            $table->text('Observaciones');
           

            $table->dateTime('Fecha_Hora', $precision = 0);
        });

    

    }


    /**
     * Id

     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
}
