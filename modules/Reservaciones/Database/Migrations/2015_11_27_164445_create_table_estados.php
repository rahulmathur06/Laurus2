<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstados extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_locaciones_estados', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre');
            $table->string('acron',3);

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
        Schema::drop('mv3_locaciones_estados');
    }

}
