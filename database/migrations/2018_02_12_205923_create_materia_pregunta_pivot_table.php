<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaPreguntaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_pregunta_pivot', function (Blueprint $table) {
            $table->integer('materia_id')->unsigned();
            $table->integer('pregunta_id')->unsigned();

            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia_pregunta_pivot');
    }
}
