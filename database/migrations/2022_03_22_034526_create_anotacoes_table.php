<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('anotacoes', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->unsignedBigInteger('user_cadastro_id');
            $table->unsignedBigInteger('user_alteracao_id')->nullable();
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
            $table->timestamps();

            $table->foreign('user_cadastro_id')->references('id')->on('users');
            $table->foreign('user_alteracao_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anotacoes');
    }
};
