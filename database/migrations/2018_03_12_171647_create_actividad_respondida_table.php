<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadRespondidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_respondida', function (Blueprint $table) {
            $table->increments('id');

            $table->string('archivo');
            
            $table->integer('user_id')->unsigned();
            $table->integer('status')->nullable();
            $table->integer('actividad_id')->unsigned();
            $table->integer('materia_id')->unsigned();


                 $table->foreign('actividad_id')->references('id')->on('actividad');
                $table->foreign('user_id')->references('id')->on('users');

                $table->foreign('materia_id')->references('id')->on('materias');



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
        Schema::dropIfExists('actividad_respondida');
    }
}
