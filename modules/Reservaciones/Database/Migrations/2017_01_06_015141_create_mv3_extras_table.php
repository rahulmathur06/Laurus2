<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMv3ExtrasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_extras', function(Blueprint $table)
        {
            $table->increments('id');
            $table->double('costo_mxn');
            $table->double('costo_usd');
            $table->tinyInteger('incrementable');
            $table->string('descripcion_esMX', 80);
            $table->string('descripcion_enUS', 80);
            $table->tinyInteger('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_extras');
    }

}
