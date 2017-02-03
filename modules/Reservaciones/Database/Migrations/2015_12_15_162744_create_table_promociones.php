<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePromociones extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv3_promociones', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('plancode_id')->unsigned();
            $table->integer('cobertura_id')->unsigned();

            $table->integer('pages_id');
            $table->tinyInteger('destino_mes')->comment ="1:si,0:no";

            $table->date('fechaini');
            $table->date('fechafin');

            $table->text('descripcion')->comment = "Descripcion corta";
            $table->string('clave');
            $table->tinyInteger('acumular_prepago')->comment = "1:si,0:no";
            $table->double('acumular_prepago_valor')->nullable();
            $table->tinyInteger('tarifa_desglozada')->comment = "1:si,0:no";
            $table->tinyInteger('mostrar_descuento')->comment = "1:si,0:no";
            $table->enum('moneda',['MXN','USD']);
            $table->enum('tipo_promocion',['playa','ciudad']);
            $table->text('terminos_condiciones')->comment ="Descripcion larga";
            $table->tinyInteger('visible')->comment ="1:si,0:no";
            $table->tinyInteger('activo')->comment ="1:si,0:no";



            $table->foreign('plancode_id')->references('id')->on('mv3_seguros_pcode_coberturas_tarifas');
            $table->foreign('cobertura_id')->references('id')->on('mv3_seguros_coberturas');
            $table->nullableTimestamps();
        });


        Schema::create('mv3_traducciones_promocion', function(Blueprint $table){
            $table->increments('id');
            $table->integer('promocion_id')->unsigned();

            $table->string('idioma');

            $table->string('nombre');
            $table->string('intro');
            $table->text('contenido');
            $table->text('restricciones');
            $table->text('url')->nullable()->comment= "'URL de laq carpeta de la promoción";
            $table->text('url_banner_home')->nullable();
            $table->text('url_banner')->nullable();
            $table->text('url_banner_locacion')->nullable();
            $table->text('url_blast')->comment = "URL al blast de la promoción";

            $table->string('titulo_destino');


            $table->foreign('promocion_id')->references('id')->on('mv3_promociones')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('mv3_traducciones_promocion');
        Schema::drop('mv3_promociones');
    }

}
