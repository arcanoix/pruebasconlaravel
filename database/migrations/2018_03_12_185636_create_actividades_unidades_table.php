<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_unidades', function (Blueprint $table) {
            $table->integer('actividades_id')->unsigned();
            $table->integer('unidades_id')->unsigned();

            $table->foreign('actividades_id')->references('id')->on('actividad');
            $table->foreign('unidades_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_unidades');
    }
}
