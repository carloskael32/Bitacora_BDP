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
            $table->double('Temperatura');
            $table->double('Humedad');
            $table->string('Filtracion');
            $table->string('UPS');
            $table->text('Generador');
            $table->text('Observaciones');
           

            $table->date('Fecha');
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
