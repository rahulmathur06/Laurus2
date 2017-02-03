<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAutosClases extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('mv3_autos_categorias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->nullableTimestamps();
        });


        Schema::create('mv3_traducciones_categorias',function(Blueprint $table){

            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->string('idioma');
            $table->string('nombre');
            $table->nullableTimestamps();
            $table->foreign('categoria_id')->references('id')->on('mv3_autos_categorias')->onDelete('cascade');

        });

        Schema::create('mv3_autos_clases', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->string('sipp',4)->nullable();
            $table->string('clase');
            $table->integer('prioridad');
            $table->enum('grupo',['ANTYR','BEPENSA']);
            $table->unique('sipp');
            $table->foreign('categoria_id')->references('id')->on('mv3_autos_categorias');

            $table->nullableTimestamps();
        });

        Schema::create('mv3_traducciones_clases',function(Blueprint $table){

            $table->increments('id');
            $table->integer('clase_id')->unsigned();
            $table->string('idioma');
            $table->string('nombre');
            $table->text('descripcion');
            $table->nullableTimestamps();
            $table->foreign('clase_id')->references('id')->on('mv3_autos_clases')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_traducciones_clases');
        Schema::drop('mv3_traducciones_categorias');
        Schema::drop('mv3_autos_clases');
        Schema::drop('mv3_autos_categorias');
    }

}
