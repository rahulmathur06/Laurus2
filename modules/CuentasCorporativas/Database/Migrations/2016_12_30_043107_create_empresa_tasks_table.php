<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTasksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_tasks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('empresa_id');
            $table->integer('task_id');
            $table->string('type');
            $table->tinyInteger('task_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresa_tasks');
    }

}
