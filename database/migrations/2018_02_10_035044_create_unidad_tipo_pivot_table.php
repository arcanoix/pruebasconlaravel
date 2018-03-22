<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadTipoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_tipo_pivot', function (Blueprint $table) {
            $table->integer('unidad_id')->unsigned();
            $table->integer('tipo_e_id')->unsigned();

            $table->foreign('unidad_id')->references('id')->on('unidades');
            $table->foreign('tipo_e_id')->references('id')->on('tipoeval');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_tipo_pivot');
    }
}
