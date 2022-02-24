<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();

          $table->string('agencia');
            $table->string('encargadoop');
            //$table->string('name');
            $table->double('temperatura');
            $table->double('humedad');
            $table->string('filtracion');
            $table->string('ups');
            $table->text('generador');
            $table->text('observaciones');        
            $table->dateTime('fecha');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alertas');
    }
}
