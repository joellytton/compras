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
        Schema::create('acao_convenios_processos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acao_convenios_id');
            $table->unsignedBigInteger('processo_id');
            $table->decimal('valor_acao_convenio', 15, 2);
            $table->foreign('acao_convenios_id')->references('id')->on('acao_convenios');
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
        Schema::dropIfExists('acao_convenios_processos');
    }
};
