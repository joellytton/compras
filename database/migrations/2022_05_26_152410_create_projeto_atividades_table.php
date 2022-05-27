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
        Schema::create('projeto_atividades', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 250);
            $table->enum('tipo', ['projeto', 'atividade']);
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');

            $table->unsignedBigInteger('user_cadastro_id');
            $table->unsignedBigInteger('user_alteracao_id')->nullable();
            $table->timestamps();

            $table->foreign('user_cadastro_id')->references('id')->on('users');
            $table->foreign('user_alteracao_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projeto_atividades');
    }
};
