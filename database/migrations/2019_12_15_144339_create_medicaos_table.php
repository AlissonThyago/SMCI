<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('valor');
            $table->datetime('data_horario');
            $table->unsignedInteger('sensor_id')->foreign('sensor_id')->references('id')->on('sensors');
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
        Schema::dropIfExists('medicaos');
    }
}
