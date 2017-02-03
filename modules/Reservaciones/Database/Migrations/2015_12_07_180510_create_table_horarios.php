<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHorarios extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_horarios', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('valor');
            $table->string('hora');
            $table->time('hora_larga');
            $table->integer('hora_militar');
            $table->nullableTimestamps();
        });

        Schema::create('mv3_horarios_anticipacion', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('locacion_id')->unsigned();
            $table->integer('clase_id')->unsigned();
            $table->integer('min_tiempo');

            $table->foreign('locacion_id')->references('id')->on('mv3_locaciones_locacion')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('clase_id')->references('id')->on('mv3_autos_clases')->onDelete('cascade')->onUpdate('cascade');
            $table->nullableTimestamps();
        });
        Schema::create('mv3_horarios_restricciones', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('locacion_id')->unsigned();
            $table->tinyInteger('day')->nullable()->comment = "0 = domingo, sabado = 6";
            $table->time('start_time')->nullable()->comment = "En hora militar";
            $table->time('end_time')->nullable()->comment = "En hora militar";


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
        Schema::drop('mv3_horarios');
        Schema::drop('mv3_horarios_anticipacion');
        Schema::drop('mv3_horarios_restricciones');
    }

}
