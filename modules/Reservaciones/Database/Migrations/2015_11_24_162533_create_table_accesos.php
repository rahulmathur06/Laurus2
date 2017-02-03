<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAccesos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_accesos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_convenio')->unsigned();
            $table->string('usuario');
            $table->string('password');
            $table->string('ip',15);
            $table->tinyInteger('activo')->default(0);
            $table->nullableTimestamps();

            $table->foreign('id_convenio')->references('id')->on('mv3_convenio_config');
        });

        Schema::create('mv3_accesos_log', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_accesos')->unsigned();
            $table->timestamp('fecha_acceso');
            $table->nullableTimestamps();

            $table->foreign('id_accesos')->references('id')->on('mv3_accesos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mv3_accesos_log');
        Schema::drop('mv3_accesos');
    }

}
