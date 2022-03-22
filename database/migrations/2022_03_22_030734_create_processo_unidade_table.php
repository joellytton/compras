<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_unidade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('processo_id');
            $table->unsignedBigInteger('unidades_contempladas_id');
            $table->timestamps();

            $table->foreign('unidades_contempladas_id')->references('id')
                ->on('unidades_contempladas');
            $table->foreign('processo_id')->references('id')->on('processos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processo_unidade');
    }
};
