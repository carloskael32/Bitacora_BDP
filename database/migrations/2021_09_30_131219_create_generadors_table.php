<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generadors', function (Blueprint $table) {
            $table->id();
            
            $table->dateTime('fecha');
            $table->integer('tiempo');
            $table->string('marca');
            $table->string('modelo')->nullable();
            $table->String('agencia');
            $table->String('encargadoop');
            $table->text('observaciones')->nullable();
            $table->String('cod_activo')->nullable();
            $table->String('num_serie')->nullable();
            

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generadors');
    }
}
