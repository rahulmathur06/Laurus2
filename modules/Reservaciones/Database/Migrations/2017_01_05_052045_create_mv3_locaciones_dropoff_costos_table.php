<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMv3LocacionesDropoffCostosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_locaciones_dropoff_costos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->float('valor_mxn');
            $table->float('valor_usd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_locaciones_dropoff_costos');
    }

}
