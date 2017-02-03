<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDestinos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_locaciones_destinos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('estado_id')->unsigned();
            $table->string('nombre');
            $table->integer('orden')->nullable();


            $table->nullableTimestamps();
            $table->foreign('estado_id')->references('id')->on('mv3_locaciones_estados');

        });

        // traducciones de los destinos
        Schema::create('mv3_traducciones_destinos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_destino')->unsigned();
            $table->enum('idioma',['es-MX','en-US']);
            $table->text('mensaje');

            $table->nullableTimestamps();
            $table->foreign('id_destino')->references('id')->on('mv3_locaciones_destinos')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_traducciones_destinos');
        Schema::drop('mv3_locaciones_destinos');
    }

}
