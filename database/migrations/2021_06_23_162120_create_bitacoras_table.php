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

            $table->string('agencia');
            $table->string('encargadoop');
            $table->double('temperatura');
            $table->double('humedad');
            $table->string('filtracion');
            $table->string('UPS');
            $table->text('generador');
            $table->text('observaciones');        
            $table->dateTime('fecha');
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
