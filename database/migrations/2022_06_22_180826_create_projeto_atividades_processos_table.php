<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('projeto_atividades_processos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projeto_atividades_id');
            $table->unsignedBigInteger('processo_id');
            $table->decimal('valor_projeto_atividade', 15, 2);
            $table->foreign('projeto_atividades_id')->references('id')->on('projeto_atividades');
            $table->foreign('processo_id')->references('id')->on('processos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projeto_atividades_processos');
    }
};
