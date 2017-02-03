<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConvenio extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_convenio_config', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_empresa')->unsigned();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('acronimo',3);
            $table->string('idioma');
            $table->string('moneda');
            $table->tinyInteger('horas_tolerancia')->default(0);
            $table->tinyInteger('dias_semana')->default(0);
            $table->tinyInteger('dias_mes')->default(0);
            $table->enum('tipo',['Interno','Empresarial','Agencia','Mayorista']);
            $table->tinyInteger('prepago_habilitado')->default(0);
            $table->tinyInteger('descuento_ppgo_habilitado')->default(0);
            $table->tinyInteger('activo')->default(0);
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
        Schema::drop('mv3_convenio_config');
    }

}
