<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCiudades extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_locaciones_ciudad', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('estado_id')->unsigned();
            $table->string('nombre')->comment ="Nombre de la ciudad";
            $table->string('acron',3)->comment ="Acronimo de la ciudad";
            $table->string('aip',3)->comment = "Código de Aeropuerto";
            $table->nullableTimestamps();
            $table->foreign('estado_id')->references('id')->on('mv3_locaciones_estados');
        });


        Schema::create('mv3_locaciones_ciudad_destino', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('ciudad_id')->unsigned()->comment = "ID de la ciudad";
            $table->integer('destino_id')->unsigned()->comment = "ID del destino";


            $table->foreign('ciudad_id')->references('id')->on('mv3_locaciones_ciudad')->onDelete('cascade');
            $table->foreign('destino_id')->references('id')->on('mv3_locaciones_destinos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_locaciones_ciudad_destino');
        Schema::drop('mv3_locaciones_ciudad');

    }

}
