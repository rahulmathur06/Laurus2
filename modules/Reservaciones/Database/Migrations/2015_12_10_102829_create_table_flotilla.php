<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFlotilla extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_autos_flotilla', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('clase_id')->unsigned();
            $table->string('nombre');
            $table->enum('grupo',['ANTYR','BEPENSA']);
            $table->tinyInteger('puertas');
            $table->enum('transmision',['STD','AUT']);
            $table->enum('aire_acondicionado',['0','1']);
            $table->tinyInteger('pasajeros');
            $table->tinyInteger('equipaje_grande');
            $table->tinyInteger('equipaje_chico');
            $table->text('imagen_chica');
            $table->text('imagen');
            $table->text('img_carousel');


            $table->foreign('clase_id')->references('id')->on('mv3_autos_clases');

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
        Schema::drop('mv3_autos_flotilla');
    }

}
