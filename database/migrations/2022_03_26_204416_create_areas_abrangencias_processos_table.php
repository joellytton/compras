<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas_abrangencias_processos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_abrangencia_id');
            $table->unsignedBigInteger('processo_id');
            $table->foreign('area_abrangencia_id')->references('id')->on('areas_abrangencias');
            $table->foreign('processo_id')->references('id')->on('processos');
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
        Schema::dropIfExists('areas_abrangencias_processos');
    }
};
