<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLocaciones extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_locaciones_locacion', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('ciudad_id')->unsigned();
            $table->string('clave')->nullable();
            $table->string('clave_jr')->nullable();
            $table->enum('grupo',['ANTYR','BEPENSA'])->default('ANTYR');
            $table->integer('orden')->nullable();
            $table->decimal('airportfee',5,2);
            $table->decimal('iva',5,2)->nullable();
            $table->tinyInteger('zoom')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('centro_latitud')->nullable();
            $table->string('centro_longitud')->nullable();
            $table->text('direccion_google_maps')->nullable();
            $table->string('imagen')->nullable();
            $table->tinyInteger('activo')->default(0);
            $table->enum('tipo_locacion',['ciudad','aeropuerto'])->default('ciudad');


            $table->foreign('ciudad_id')->references('id')->on('mv3_locaciones_ciudad');

            $table->nullableTimestamps();
        });

        Schema::create('mv3_direccion_locacion',function(Blueprint $table){
            $table->increments('id');
            $table->integer('locacion_id')->unsigned();
            $table->string('direccion');
            $table->string('colonia');
            $table->string('cp');
            $table->string('tel1');
            $table->string('tel2')->nullable();
            $table->string('horario');
            $table->string('horario2')->nullable();

            $table->foreign('locacion_id')->references('id')->on('mv3_locaciones_locacion')->onDelete('cascade')->onUpdate('cascade');


            $table->nullableTimestamps();

        });

        Schema::create('mv3_traducciones_locacion',function(Blueprint $table){
            $table->increments('id');
            $table->integer('locacion_id')->unsigned();
            $table->enum('idioma',['es-MX','en-US']);
            $table->string('nombre');

            $table->foreign('locacion_id')->references('id')->on('mv3_locaciones_locacion')->onDelete('cascade')->onUpdate('cascade');


            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_direccion_locacion');
        Schema::drop('mv3_traducciones_locacion');
        Schema::drop('mv3_locaciones_locacion');
    }

}
