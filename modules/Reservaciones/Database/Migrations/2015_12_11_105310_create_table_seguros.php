<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSeguros extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // coberturas
        Schema::create('mv3_seguros_coberturas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('pcode')->comment = "codigo de producto";
            $table->string('pcodetarifa')->comment = "Plan Code de Tarifas. Solo para adaptarlo al JR.";
            $table->boolean('web')->default(0)->comment = "1:Cobertura Web, 0:Cobertura de Cualquier Otro Tipo de Convenio";
            $table->nullableTimestamps();
        });
        // catalogos

        Schema::create('mv3_seguros_catalogos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('clave')->comment = "codigo de producto";
            $table->nullableTimestamps();
        });
        // Grupos
        Schema::create('mv3_seguros_grupos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->nullableTimestamps();
        });

        // table pivote
        Schema::create('mv3_seguros_catalogos_coberturas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('cobertura_id')->unsigned();
            $table->integer('catalogo_id')->unsigned();

            $table->foreign('cobertura_id')->references('id')->on('mv3_seguros_coberturas')->onDelete('cascade');
            $table->foreign('catalogo_id')->references('id')->on('mv3_seguros_catalogos')->onDelete('cascade');

            $table->nullableTimestamps();
        });

        //
        Schema::create('mv3_seguros_pcode_coberturas_tarifas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre');
            $table->string('plan_code');
            $table->text('descripcion');
            $table->double('cdw')->comment = "tarifa para colision de daños";
            $table->double('tpl')->comment = "tarifa para cobertura de daños a terceros";
            $table->double('pai')->comment = "tarifa para pai";
            $table->double('dp')->comment = "tarifa para dp";
            $table->nullableTimestamps();
        });

        // traducciones
        Schema::create('mv3_traducciones_coberturas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('cobertura_id')->unsigned()->comment = "ID de la cobertura";
            $table->string('idioma');
            $table->string('nombre');
            $table->text('descripcion');

            $table->foreign('cobertura_id')->references('id')->on('mv3_seguros_coberturas')->onDelete('cascade');
            $table->nullableTimestamps();
        });

        Schema::create('mv3_traducciones_catalogos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('catalogo_id')->unsigned()->comment = "ID del catalogo.";
            $table->string('idioma');
            $table->string('nombre');
            $table->text('descripcion');

            $table->foreign('catalogo_id')->references('id')->on('mv3_seguros_catalogos')->onDelete('cascade');
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
        Schema::drop('mv3_seguros_pcode_coberturas_tarifas');
        Schema::drop('mv3_seguros_catalogos_coberturas');
        Schema::drop('mv3_traducciones_coberturas');
        Schema::drop('mv3_traducciones_catalogos');
        Schema::drop('mv3_seguros_grupos');
        Schema::drop('mv3_seguros_coberturas');
        Schema::drop('mv3_seguros_catalogos');
    }

}
