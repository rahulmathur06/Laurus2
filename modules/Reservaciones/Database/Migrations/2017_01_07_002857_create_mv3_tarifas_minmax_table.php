<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMv3TarifasMinmaxTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_tarifas_minmax', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('locacion_id');
            $table->integer('autos_clases_id');
            $table->double('min_precio',7,2);
            $table->double('max_precio',7,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_tarifas_minmax');
    }

}
