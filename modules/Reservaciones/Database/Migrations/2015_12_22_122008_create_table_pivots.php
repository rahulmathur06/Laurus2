<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePivots extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_locaciones_autos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('locacion_id')->unsigned()->comment = "ID de la Locacion(oficina)";
            $table->integer('clase_id')->unsigned()->comment = "ID de la clase de autos";


            $table->foreign('locacion_id')->references('id')->on('mv3_locaciones_locacion')->onDelete('cascade');
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
        Schema::drop('mv3_locaciones_autos');
    }

}
