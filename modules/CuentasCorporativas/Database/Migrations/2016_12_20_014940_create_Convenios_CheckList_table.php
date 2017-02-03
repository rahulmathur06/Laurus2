<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConveniosCheckListTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Convenios_CheckList', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('documento',50);
            $table->integer('tipo_persona_id');
            $table->integer('tipo_convenio_id');
            $table->integer('orden');
            $table->boolean('requerido')->default(0);
            $table->boolean('validar_fecha')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Convenios_CheckList');
    }

}
