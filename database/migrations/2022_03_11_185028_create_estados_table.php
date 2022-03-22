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
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pais_id');
            $table->char('sigla', '5');
            $table->string('nome', '250');
            $table->unsignedBigInteger('user_cadastro_id')->nullable();
            $table->unsignedBigInteger('user_alteracao_id')->nullable();
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
            $table->timestamps();

            $table->foreign('pais_id')->references('id')->on('paises');
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
        Schema::dropIfExists('estados');
    }
};
