<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaUnidadPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_unidad_pivot', function (Blueprint $table) {
            $table->integer('materia_id')->unsigned();
            $table->integer('unidad_id')->unsigned();

            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('unidad_id')->references('id')->on('unidades');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia_unidad_pivot');
    }
}
