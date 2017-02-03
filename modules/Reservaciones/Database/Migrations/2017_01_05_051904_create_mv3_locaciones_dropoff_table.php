<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMv3LocacionesDropoffTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_locaciones_dropoff', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('ciudad_pickup_id');
            $table->integer('ciudad_dropoff_id');
            $table->integer('distancia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_locaciones_dropoff');
    }

}
