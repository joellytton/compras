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
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->string('sei', 100);
            $table->string('pregao', 30);
            $table->decimal('total_estimado', 15, 2);
            $table->decimal('total_homologado', 15, 2);
            $table->date('data_processo');
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
            $table->unsignedBigInteger('objeto_id');
            $table->unsignedBigInteger('modalidade_id');
            $table->unsignedBigInteger('user_cadastro_id');
            $table->unsignedBigInteger('user_alteracao_id')->nullable();
            $table->timestamps();

            $table->foreign('objeto_id')->references('id')->on('objetos');
            $table->foreign('modalidade_id')->references('id')->on('modalidades');
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
        Schema::dropIfExists('processo');
    }
};
