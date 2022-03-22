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
        Schema::create('anexo', function (Blueprint $table) {
            $table->id();
            $table->string('descricao_anexo', 250);
            $table->text('link_anexo');
            $table->unsignedBigInteger('processo_id');
            $table->unsignedBigInteger('user_cadastro_id');
            $table->unsignedBigInteger('user_alteracao_id')->nullable();
            $table->string('tipo', 50);
            $table->binary('anexo');
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');

            $table->timestamps();

            $table->foreign('processo_id')->references('id')->on('processos');
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
        Schema::dropIfExists('anexo');
    }
};
